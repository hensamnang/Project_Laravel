@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Student Follow Up</h3>
                </div>   
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-10">
            <a href="{{route('student.create')}}" class="btn btn-success mb-5">Add Student</a>
            <table class="table table-bordered text-center">
                <thead class="btn-success">
                    <tr>
                        <th width="10%">Profile</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Class</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td><img src="{{ URL::to('/') }}/images/{{$student->picture}}" class="img-thumbnail" width="75" /></td>
                                <td>{{$student->firstname}}</td>
                                <td>{{$student->lastname}}</td>
                                <td>{{$student->class}}</td>
                                <td>{{$student->description}}</td>
                                <td>
                                    <a href="{{route('student.edit',$student -> id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
                                    <form action="{{route('student.destroy',$student ->id)}}" method="POST">
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
@endsection
