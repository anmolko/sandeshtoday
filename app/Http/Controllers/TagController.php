<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('backend.tag.index',compact('tags'));
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
        $slug  = Tag::where('slug',$request->input('slug'))->first();
        if ($slug !== null) {
            $status ='slug duplicate';
            return response()->json(['status'=>$status,'message'=>'This tag slug is already in use. Try something different.']);
        }else{
            $newtags               =  Tag::create([
                'name'              => $request->input('name'),
                'slug'              => $request->input('slug'),
                'description'       => $request->input('description'),
                'created_by'        => Auth::user()->id,
            ]);
            if($newtags){
                $tag   = Tag::latest()->first();
                $count = $tag->BlogsCount();
                $status ='success';
                return response()->json(['status'=>$status,'message'=>'New Tag added to list.','tag'=>$tag,'count'=>$count]);
            }
            else{
                $status ='error';
                return response()->json(['status'=>$status,'message'=>'Could not create new Tag at the moment. Try Again later !']);
            }
        }
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
        $edit     = Tag::find($id);
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
        $tag                   = Tag::find($id);
        $tag->name             = $request->input('name');
        $tag->slug             = $request->input('slug');
        $tag->description      = $request->input('description');
        $tag->updated_by       = Auth::user()->id;
        $status                = $tag->update();

        if($status){
            Session::flash('success','Tag details has been updated');
        }
        else{
            Session::flash('error','Something Went Wrong.Tag could not be updated');
        }
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Tag::find($id);
        $rid             = $delete->id;
        $count           = $delete->count();
        $delete->delete();
        $status ='success';
        return response()->json(['status'=>$status,'id'=>$rid,'count'=>$count,'message'=>'Tag was removed!']);


    }

    public function blogs($id)
    {
        $tag      = Tag::find($id);
        $blogs    = $tag->blogs;

        return view('backend.blog.index',compact('blogs','tag'));
    }

    public function tagsdynamic(Request $request)
    {
//        dd($request->all());
        $incomingSlug   = str_replace(' ', '-', $request->input('name'));
        $slug           = Tag::where('slug',$incomingSlug)->first();
        if ($slug !== null) {
            $status ='slug duplicate';
            return response()->json(['status'=>$status,'message'=>'This tag slug is already in use. Please select it from the list.']);
        }else {
            $tag = Tag::create([
                'name' => $request->input('name'),
                'slug' => $incomingSlug,
                'description' => null,
                'created_by' => Auth::user()->id,
            ]);
            if($tag){
                $status ='success';
                return response()->json(['status'=>$status,'message'=>'New Tag added to list.','tag'=>$tag]);
            }
            else{
                $status ='error';
                return response()->json(['status'=>$status,'message'=>'Could not create new Tag at the moment. Try Again later !']);
            }
        }


    }
}
