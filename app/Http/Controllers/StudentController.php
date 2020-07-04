<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        return view('Students.createStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       $storeStudent = new Student;
       $storeStudent->firstname     = $request->input('firstname') ;
       $storeStudent->lastname      = $request->input('lastname') ;
       $storeStudent->class         = $request->input('class') ;
       $storeStudent->description   = $request->input('description') ;
    if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fillName = time() . '.' . $extension;
        $file->move('Images/', $fillName);
        $storeStudent->picture = $fillName;
    }else{
        return $request;
        $storeStudent->picture = ' ';
    }
       $storeStudent->save();
       return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $showStudent = Student::find($id);
        // // $Comment ->$showStudent->;

        // return view('Comments.addComment',compact('showStudent','Comment'))

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $editStudent = Student::find($id);
        return view('Students.editStudent',compact('editStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
       $updateStudent = Student::find($id);
       $updateStudent->firstname     = $request->input('firstname') ;
       $updateStudent->lastname      = $request->input('lastname') ;
       $updateStudent->class         = $request->input('class') ;
       $updateStudent->description   = $request->input('description') ;
       
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fillName = time() . '.' . $extension;
        $file->move('Images/', $fillName);
        $updateStudent->picture = $fillName;
    }
       $updateStudent->save();
       return redirect('home');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $delete = Student::find($id);
        $delete->delete();
       return redirect('home');
    }

    public function outOfFolloUp(Request $request, $id){
        $students = Student::find($id);
        $students->activeFollowup = 1;
        $students->save();
        return redirect('home');
    }

    public function backFolloUp(Request $request,$id){
        $students = Student::find($id);
        $students->activeFollowup = 0;
        $students->save();
        return redirect('home');
    }

    public function viewOutOfFollowUpList(){
        $students = Student::where('activeFollowup', 1)->get();
        return view('outOfFollowUp',compact('students'));    
    }







}
