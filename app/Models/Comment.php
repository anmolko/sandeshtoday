<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bsdate;

class Comment extends Model
{
    use HasFactory;
    protected $table ='comments';
    protected $fillable =['id','user_id','blog_id','parent_id','comment'];
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
        'second' => 'सेकन्ड',
        'year' => 'वर्ष',
        'years' => 'वर्ष',
        'hours' => 'घन्टा',
        'hour' => 'घन्टा',
        'days' => 'दिन',
        'day' => 'दिन',
        'ago' => 'अगाडि',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id' );
    }

    public function blog(){
        return $this->belongsTo('App\Models\Blog','blog_id','id')->orderBy('created_at','DESC');
    }

    public function publishedDateNepali(){
        $year    = $this->created_at->format('Y');
        $month   = $this->created_at->format('m');
        $day     = $this->created_at->format('d');
        $date    = Bsdate::eng_to_nep($year,$month,$day);
        $time    = $this->toNepaliStrings($this->created_at->format('H:i'));
        echo $date['date'].' '.$date['nmonth'].' '.$date['year'].','.$time;
    }

    public function toNepaliStrings($string){
        return strtr($string, $this->nepaliArray);
    }

    public function getCommentedAgoinNepali(){
        $string = $this->created_at->diffForHumans();
        return $this->toNepaliStrings($this->created_at->diffForHumans());
    }

    public function replies(){
        return $this->hasMany('App\Models\Comment','parent_id')->orderBy('created_at','DESC');
    }

    public function haslikedordisliked($user_id){
        return LikeComment::where('comment_id',$this->id)->where('user_id',$user_id)->count()>0;
    }

    public function likeComment(){
        return $this->hasMany('App\Models\LikeComment','comment_id','id' );
    }

    public function hasliked($user_id){
        return LikeComment::where('comment_id',$this->id)->where('user_id',$user_id)->where('like',1)->count()>0;
    }

    public function hasdisliked($user_id){
        return LikeComment::where('comment_id',$this->id)->where('user_id',$user_id)->where('dislike',1)->count()>0;
    }

    public function likes(){
        return $this->hasMany('App\Models\LikeComment','comment_id')->sum('like');
    }

    public function dislikes(){
        return $this->hasMany('App\Models\LikeComment','comment_id')->sum('dislike');
    }

}
