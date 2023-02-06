<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\LikeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $comments               =  Comment::create([
            'user_id'           => $request->input('user_id'),
            'blog_id'           => $request->input('blog_id'),
            'parent_id'         => $request->input('parent_id'),
            'comment'           => $request->input('comment'),
        ]);
        if($comments){
            Session::flash('success','Your comment has been listed. Thank you!');
        }
        else{
            Session::flash('warning','Your comment has could not be listed. Thank you!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete          = Comment::with('replies','user')->find($id);
        $rid             = $delete->id;
        if(count($delete->replies)>0){
            foreach ($delete->replies as $reply){
                $repled = Comment::where('parent_id',$id)->first();
                $repled->parent_id = null;
                $repled->save();
            }
        }

        if( $delete->likes()>0 || $delete->dislikes()>0){
            $interaction = LikeComment::where('comment_id',$id)->where('user_id',$delete->user_id)->first();
            $interaction->delete();
        }
        $status = $delete->delete();
        return response()->json(['status'=>'success','id'=>$rid,'message'=>'Comment and its interaction was removed!']);

    }

    public function commentLikes(Request $request){
        $data             = new LikeComment();
        $data->comment_id = $request->comment;
        $data->user_id    = $request->user;
        if($request->type == 'like'){
            $data->like = 1;
        }else{
            $data-> dislike =1;
        }
        $data->save();
        return response()->json([
            'bool'=>true
        ]);
    }
}
