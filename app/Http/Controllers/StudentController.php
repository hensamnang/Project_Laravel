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
       $storeStudent->picture       = $request->input('image') ;
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
        //
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
       $updateStudent->picture       = $request->input('image') ;
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
}
