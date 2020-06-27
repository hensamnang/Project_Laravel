@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-active">
                    <h4 class="center blue-text">Student Follow Up List</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{route('student.create')}}" class="btn btn-primary mb-5">Add Student</a>
                    <table class="table table-bordered text-center">
                        <thead class="btn-primary">
                            <tr>
                                <th width="3%">ID</th>
                                <th width="10%">Profile</th>
                                <th width="15%">Student Name</th>
                                <th width="10%">Class</th>
                                <th width="30%">Description</th>
                                <th width="30%">Action</th>
                            </tr>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td><img src="{{asset('Images/'. $student->picture) }}" class="rounded-circle" width="50" height="50" /></td>
                                        <td>{{$student->firstname}} {{$student->lastname}}</td>
                                        <td>{{$student->class}}</td>
                                        <td>{{$student->description}}</td>
                                        <td>
                                            <form action="{{route('student.destroy',$student ->id)}}" method="POST">
                                                <a href="{{route('comment.show',$student->id)}}" class="btn btn-success"><i class="material-icons blue-text">comment</i></a>
                                                <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary"><i class="material-icons blue-text">edite</i></a>
                                                @csrf
                                                @method('DELETE')
                                               <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
