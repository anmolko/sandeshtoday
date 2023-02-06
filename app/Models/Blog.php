<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bsdate;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;

class Blog extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;

    protected $table ='blogs';
    protected $fillable =['id','title','slug','numeric_slug','excerpt','authors','show_featured_image','description','status','image','featured_from','featured_to','meta_title','meta_tags','meta_description','created_by','updated_by'];

    private $nepaliArray = [
        '0' => '०',
        '1' => '१',
        '2' => '२',
        '3' => '३',
        '4' => '४',
        '5' => '५',
        '6' => '६',
        '7' => '७',
        '8' => '८',
        '9' => '९',
        'minutes' => 'मिनेट',
        'minute' => 'मिनेट',
        'week' => 'हप्ता',
        'weeks' => 'हप्ता',
        'year' => 'वर्ष',
        'years' => 'वर्ष',
        'hours' => 'घन्टा',
        'second' => 'सेकन्ड',
        'hour' => 'घन्टा',
        'days' => 'दिन',
        'day' => 'दिन',
        'ago' => 'अगाडि',
    ];

    public function author(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function publishedDateNepali(){
        $year    = $this->created_at->format('Y');
        $month   = $this->created_at->format('m');
        $day     = $this->created_at->format('d');
        $date    = Bsdate::eng_to_nep($year,$month,$day);
        $time    = $this->toNepaliString($this->created_at->format('H:i'));
        echo $date['date'].' '.$date['nmonth'].' '.$date['year'].','.$time;
    }

    public function toNepaliString($string){
        return strtr($string, $this->nepaliArray);
    }
    public function getMinsAgoinNepali(){
        $string = $this->created_at->diffForHumans();
        return $this->toNepaliString($this->created_at->diffForHumans());
    }

    public function hasCategory($categoryid){
        return $this->categories()->where('category_id',$categoryid)->count()>0;
    }

    public function hasTag($tagid){
        return $this->tags()->where('tag_id',$tagid)->count()>0;
    }

    public function url(){
        return 'post/'.$this->created_at->year.'/'.$this->created_at->month.'/'.$this->numeric_slug;
    }

    public function shortContent($cut = 0){
        $content    = $this->description;
        $start      = strpos($content, '<p>');
        $end        = strpos($content, '</p>', $start);
        $paragraph  = substr($content, $start, $end-$start+4);
        $finalData  = strip_tags($paragraph);
        if($cut>0 && strlen($finalData)<$cut){
            return substr($finalData,0,$cut);
        }
        return $finalData;
    }

    public function relatedPostsByTag()
    {
        return Blog::whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('tags.id')->all();
            $query->whereIn('tags.id', $tagIds);
        })->where('id', '<>', $this->id)->get();
    }

    public function relatedPostsByCategory()
    {
        return Blog::whereHas('categories', function ($query) {
            $tagIds = $this->categories()->pluck('categories.id')->all();
            $query->whereIn('categories.id', $tagIds);
        })->where('id', '<>', $this->id)->get();
    }

    public function relatedPostsCategory($catid)
    {
        return Blog::whereHas('categories', function ($query) {
            $query->whereIn('categories.id', $catid);
        })->get();
    }

    public function singleSidebarAds($skip,$take)
    {
        return Ads::where('placement','post-side-bar-banner')->where('status','active')->skip($skip)->take($take)->get();
    }

    public function LatestPosts($skip,$take)
    {
        return Blog::orderBy('created_at', 'DESC')->where('status','active')->skip($skip)->take($take)->get();
    }

    public function getBelowPostBanner()
    {
        return Ads::where('placement','post-end')->where('status','active')->first();
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id')->orderBy('created_at','DESC');
    }

    public function totalCount(){
        return Blog::withTotalVisitCount()->where('id', $this->id)->first()->visit_count_total;
    }
}
