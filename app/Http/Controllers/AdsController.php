<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $banner;

    public function __construct()
    {
        $this->middleware('auth');
        $this->banner   = public_path('/images/banners');
    }

    public function index()
    {
        $ads       = Ads::orderBy('created_at', 'desc')->get();
        return view('backend.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'name'              => $request->input('name'),
            'url'               => $request->input('url'),
            'placement'         => $request->input('placement'),
            'status'            => 'active',
            'created_by'        => Auth::user()->id,
        ];
        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_banners_'.$image->getClientOriginalName();

            if (!is_dir($this->banner)) {
                mkdir($this->banner, 0777);
            }
            $path           = base_path().'/public/images/banners/';
            if ($image->getClientOriginalExtension() == 'gif') {
                $moved = $image->move($path, $name);
            }
            else {
                $moved    = Image::make($image->getRealPath())->orientate()->save($path.$name);
            }
            if ($moved){
                $data['image'] = $name;
            }

        }

        $blog = Ads::create($data);
        if($blog){
            Session::flash('success','Advertisement was created successfully');
        }
        else{
            Session::flash('error','Advertisement could not be created.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit     = Ads::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ads                   = Ads::find($id);
        $ads->name             = $request->input('name');
        $ads->url              = $request->input('url');
        $ads->placement        = $request->input('placement');
        $ads->status           = $request->input('status');
        $ads->updated_by       = Auth::user()->id;
        $oldimage              = $ads->image;

        if (!empty($request->file('image'))){
            $image             = $request->file('image');
            $name1             = uniqid().'_banners_'.$image->getClientOriginalName();
            $path              = base_path().'/public/images/banners/';

            if ($image->getClientOriginalExtension() == 'gif') {
                $moved = $image->move($path, $name1);
            }
            else {
                $moved = Image::make($image->getRealPath())->orientate()->save($path . $name1);
            }
            if ($moved){
                $ads->image= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/banners/'.$oldimage)){
                    @unlink(public_path().'/images/banners/'.$oldimage);
                }
            }
        }
        $status                = $ads->update();
        if($status){
            Session::flash('success','Advertisement was created successfully');
        }
        else{
            Session::flash('error','Advertisement could not be updated.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Ads::find($id);
        $rid             = $delete->id;
        if (!empty($delete->image) && file_exists(public_path().'/images/banners/'.$delete->image)){
            @unlink(public_path().'/images/banners/'.$delete->image);
        }
        $status = $delete->delete();
        if($status){
            $status ='success';
            return response()->json(['status'=>$status,'message'=>'Advertisement has been removed! ']);        }
        else{
            $status ='error';
            return response()->json(['status'=>$status,'message'=>'Advertisement could not be removed. Try Again later !']);
        }

    }

    public function updateStatus(Request $request, $id){
        $ads          = Ads::find($id);
        $ads->status  = $request->status;
        $status       = $ads->update();
        $new_status   = ($ads->status == 'inactive') ? "Inactive" : "Active";
        $value        = ($ads->status == 'inactive') ? "active":"inactive";
        if($status){
            $status ='success';
            return response()->json(['status'=>$status,'new_status'=>$new_status,'id'=>$id,'value'=>$value]);
        }
        else{
            $status ='error';
            return response()->json(['status'=>$status,'new_status'=>$new_status,'id'=>$id,'value'=>$value]);
        }
        return response()->json($confirmed);
    }
}
