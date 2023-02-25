<?php

namespace App\Http\Controllers;

use App\Models\PropertyAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PropertyAdvertisementController extends Controller
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
        //
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
            'amount'            => $request->input('amount'),
            'status'            => 'active',
            'created_by'        => Auth::user()->id,
        ];
        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_'.$image->getClientOriginalName();

            if (!is_dir($this->banner)) {
                mkdir($this->banner, 0777);
            }
            if (!is_dir($this->banner)) {
                mkdir($this->banner, 0777);
            }
            $path           = base_path().'/public/images/banners/';
            $moved          = Image::make($image->getRealPath())->fit(300, 190)->orientate()->save($path.$name);
            if ($moved){
                $data['image'] = $name;
            }
        }
        $property_advert = PropertyAdvertisement::create($data);
        if($property_advert){
            Session::flash('success','Property Advertisement was created successfully');
        }
        else{
            Session::flash('error','Property Advertisement could not be created.');
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
        $edit     = PropertyAdvertisement::find($id);
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
        $ads                   = PropertyAdvertisement::find($id);
        $ads->name             = $request->input('name');
        $ads->url              = $request->input('url');
        $ads->amount           = $request->input('amount');
        $ads->status           = $request->input('status');
        $ads->updated_by       = Auth::user()->id;
        $oldimage              = $ads->image;

        if (!empty($request->file('image'))){
            $image       = $request->file('image');
            $name1       = uniqid().'_'.$image->getClientOriginalName();
            $path        = base_path().'/public/images/banners/';
            $moved       = Image::make($image->getRealPath())->fit(300, 190)->orientate()->save($path.$name1);

            if ($moved){
                $ads->image= $name1;
                if (!empty($oldimage) && file_exists(public_path().'/images/banners/'.$oldimage)){
                    @unlink(public_path().'/images/banners/'.$oldimage);
                }
            }
        }
        $status                = $ads->update();
        if($status){
            Session::flash('success','Property advertisement was updated successfully');
        }
        else{
            Session::flash('error','Property advertisement could not be updated.');
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
        $delete          = PropertyAdvertisement::find($id);
        $rid             = $delete->id;
        if (!empty($delete->image) && file_exists(public_path().'/images/banners/'.$delete->image)){
            @unlink(public_path().'/images/banners/'.$delete->image);
        }
        $status = $delete->delete();
        if($status){
            $status ='success';
            return response()->json(['status'=>$status,'message'=>'Property Advertisement has been removed! ']);        }
        else{
            $status ='error';
            return response()->json(['status'=>$status,'message'=>'Property Advertisement could not be removed. Try Again later !']);
        }
    }

    public function updateStatus(Request $request, $id){

        $ads          = PropertyAdvertisement::find($id);
        $ads->status  = $request->status;
        $status       = $ads->update();
        $new_status   = ($ads->status == 'inactive') ? "Inactive" : "Active";
        $value        = ($ads->status == 'inactive') ? "active":"inactive";
        if($status){
            $status ='success';
            return response()->json(['status'=>$status,'new_status'=>$new_status,'id'=>$id,'value'=>$value,'message'=>'Property advertisement status is updated']);
        }
        else{
            $status ='error';
            return response()->json(['status'=>$status,'new_status'=>$new_status,'id'=>$id,'value'=>$value,'message'=>'Property advertisement status could not be updated']);
        }
    }
}
