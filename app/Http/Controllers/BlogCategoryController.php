<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogCategoryController extends Controller
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
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('backend.blog.category.index',compact('categories'));
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
        $slug  = Category::where('slug',$request->input('slug'))->first();
        if ($slug !== null) {
            $status ='slug duplicate';
            return response()->json(['status'=>$status,'message'=>'This category slug is already in use. Try something different.']);
        }else{
            $category               =  Category::create([
                'name'              => $request->input('name'),
                'slug'              => $request->input('slug'),
                'description'       => $request->input('description'),
                'parent_category'   => $request->input('parent_category'),
                'created_by'  => Auth::user()->id,
            ]);
            if($category){
                $category = Category::latest()->first();
                $count    = $category->BlogsCount();
                $parent   = ($category->parent_category !== null) ? $category->parent_category:"0";
                $sub      = '#subcategory-list-'.$parent;
                $status   ='success';
                return response()->json(['status'=>$status,'message'=>'New blog category added to list.','category'=>$category,'count'=>$count,'sub'=>$sub]);
            }
            else{
                $status ='error';
                return response()->json(['status'=>$status,'message'=>'Could not create new blog category at the moment. Try Again later !']);
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
        $editcategory     = Category::find($id);
        return response()->json($editcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $category                   = Category::find($id);
        $category->name             = $request->input('name');
        $category->slug             = $request->input('slug');
        $category->description      = $request->input('description');
        $category->parent_category  = $request->input('parent_category');
        $category->updated_by       = Auth::user()->id;
        $status                     = $category->update();

        if($status){
            Session::flash('success','Blog category has been updated');
        }
        else{
            Session::flash('error','Something Went Wrong.Blog Category could not be Updated');
        }
        return redirect()->route('blogcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Category::find($id);
        $rid             = $delete->id;
        $checkblog       = $delete->blogs()->get();
        $count           = $delete->count();

        if ($checkblog->count() > 0) {
            $status ='error';
            return response()->json(['status'=>$status,'id'=>$rid,'count'=>$count,'message'=>'Blog Category is currently in use with different blogs. Try removing them first !']);
        }else{
            $delete->delete();
            $status ='success';
            return response()->json(['status'=>$status,'id'=>$rid,'count'=>$count,'message'=>'Blog category info was removed!']);

        }
    }

    public function blogs($id)
    {
        $category      = Category::find($id);
        $blogs         = $category->blogs;

        return view('backend.blog.index',compact('blogs','category'));
    }
}
