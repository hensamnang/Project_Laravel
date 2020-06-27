<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Student;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $showIdStudent = Student::find($id);
        $comments = $showIdStudent->comments;
        return view('Comments.detail&comment',compact('showIdStudent','comments')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $editComment = Comment::find($id);
        return view('Comments.editComment',compact('editComment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $updateComment = Comment::find($id);
        $userId = User::find(auth::id());
        
        $updateComment->comment = $request->input('comments');
        $updateComment->user_id = $userId->id;
        $updateComment->save();
        return redirect('comment/'.$updateComment->student['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $delete = Comment::find($id);
        $delete->delete();
        return redirect('comment/'.$delete->student['id']);
    }

    public function addComment(Request $request,$id){
        $studentid = Student::find($id);
        $userId = User::find(auth::id());
        $storeComment = new Comment;
        $storeComment->comment = $request->input('comments');
        $storeComment->user_id = $userId->id;
        $storeComment->student_id = $studentid->id;
        $storeComment->save();
        // return redirect('student/'.$storeComment->student['id']);
        return redirect('comment/'.$storeComment->student['id']);
    }
}
