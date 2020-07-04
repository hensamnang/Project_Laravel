@extends('layouts.app')
@section('content')
        <div class="container " id="homepage">
            <div class="row justify-content-center mb-3">
                <h2 class="center text-primary">Student Follow Up List</h2>
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
                                        <th width="40%">Action</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($students as $student)
                                           @if ($student->activeFollowup == 0)
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
                                                            <a href="{{route('outOfFolloUp',$student->id)}}" class="btn btn-warning"><i class="material-icons blue-text">remove</i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
      {{-- {{$student->links()}} --}}
@endsection
