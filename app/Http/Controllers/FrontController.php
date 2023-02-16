<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Setting;
use App\Models\HomePage;
use App\Models\Team;
use App\Models\User;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use CountryState;
use Bsdate;


class FrontController extends Controller
{
    protected $contact = null;
    protected $setting = null;
    protected $blog = null;
    protected $bcategory = null;
    protected $faq = null;
    protected $service = null;
    protected $career = null;
    protected $home_page = null;
    protected $page = null;
    protected $pagesection = null;
    protected $client = null;
    protected $slider = null;


    public function __construct(HomePage $home_page,Setting $setting, Category $bcategory, Blog $blog)
    {
        $this->setting = $setting;
        $this->bcategory = $bcategory;
        $this->blog = $blog;
        $this->home_page = $home_page;
    }



    public function index()
    {
        $date      =  date('Y-m-d');
        $featured  = $this->blog::with('author')->where('status','publish')
                    ->whereDate('featured_from', '<=', $date)
                    ->whereDate('featured_to', '>=', $date)
                    ->orderBy('created_at','desc')
                    ->limit(6)
                    ->get();
        $video_all = VideoGallery::orderBy('created_at','desc')->take(6)->get();

        return view('welcome',compact('featured','video_all'));
    }


    public function privacy()
    {
        return view('frontend.pages.privacy');
    }

    public function terms()
    {

        return view('frontend.pages.term');
    }


    public function blogs(){
        $allPosts       = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->paginate(10);
        return view('frontend.pages.blogs.index',compact('allPosts'));
    }

    public function blogSingle($year,$month,$slug){
        $singleBlog = $this->blog->with('comments.replies','comments.replies.user','comments.user')->where('numeric_slug', $slug)->first();
//        dd($singleBlog->toArray());
        if (!$singleBlog) {
            return abort(404);
        }
        $singleBlog->visit()->dailyIntervals()->withIp();//log the user visit
        $bcategories = $this->bcategory->get();
        $previous    = Blog::where('id', '<', $singleBlog->id)->orderBy('id','desc')->first();
        $next        = Blog::where('id', '>', $singleBlog->id)->orderBy('id')->first();
        $above       = Ads::where('placement','above-post-featured')->where('status','active')->first();
        $below       = Ads::where('placement','below-post-featured')->where('status','active')->first();
        $between1    = Ads::where('placement','in-between-post')->where('status','active')->first();
        $between2    = Ads::where('placement','in-between-post')->where('status','active')->skip(1)->take(1)->get();
        $belowpost   = Ads::where('placement','post-end')->where('status','active')->first();
        return view('frontend.pages.blogs.single',compact('singleBlog','bcategories','previous','next','above','below','between2','between1','belowpost'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');

    }

    public function contactStore(Request $request)
    {
        $theme_data = Setting::first();
            $data = array(
                'fullname'        =>$request->input('name'),
                'message'        =>$request->input('message'),
                'email'        =>$request->input('email'),
                'subject'        =>$request->input('subject'),
                'customer_phone'        =>$request->input('phone'),
                'address'        =>ucwords($theme_data->address),
                'site_email'        =>ucwords($theme_data->email),
                'site_name'        =>ucwords($theme_data->website_name),
                'phone'        =>ucwords($theme_data->phone),
                'logo'        =>ucwords($theme_data->logo),
            );
//             Mail::to('surajmzn75@gmail.com')->send(new ContactDetail($data));

            // Mail::to($theme_data->email)->send(new ContactDetail($data));

            // Session::flash('success','Thank you for contacting us!');
            $status ='success';
            return response()->json($status);


        // return redirect()->back();
    }

    public function blogCategories($slug){
        $category       = Category::where('slug', $slug)->first();
        $id             = Blog::with('categories')->where('status','publish')
            ->whereHas('categories',function ($query) use ($slug){
                $query->where('slug', $slug);
            })->take(3)->pluck('id');

        $allPosts       = Blog::with('categories')->where('status','publish')
            ->whereHas('categories',function ($query) use ($slug){
                $query->where('slug', $slug);
            })->whereNotIn('id', $id)->paginate(6);
        return view('frontend.pages.blogs.category',compact('allPosts','category'));
    }

    public function searchBlog(Request $request)
    {
        $query          = $request->s;
        $searchPosts       = $this->blog->where('title', 'LIKE', '%' . $query . '%')->where('status','publish')->orderBy('title', 'asc')->paginate(5);
        return view('frontend.pages.blogs.search',compact('searchPosts','query'));
    }

    public function redirectOld($one,$two,$three){
        if(is_numeric($one)){
            return redirect('https://sub.darpandainik.com/'.$one.'/'.$two.'/'.$three);
        }else{
            return redirect()->intended();
        }
    }

    public function removeFacebookUser(Request $request){

    }

    public function team(){
        $teams = Team::orderBy('order', 'asc')->get();
        return view('frontend.pages.team',compact('teams'));
    }

    public function aboutUs(){
        $homesettings    = HomePage::first();
        return view('frontend.pages.aboutus',compact('homesettings'));
    }

}
