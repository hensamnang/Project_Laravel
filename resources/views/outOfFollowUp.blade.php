@extends('layouts.header')
@section('header')
      {{-- -- out of followup student --}}
  <div class="container " id="OutofFollowUp">
    <div class="row justify-content-center mb-3">
        <h2 class="center text-primary">Student Out Of Follow Up List</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <div class="table-responsive">
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
                                   @if ($student->activeFollowup == 1)
                                        <tr>
                                            <td>{{$student->id}}</td>
                                            <td><img src="{{asset('Images/'. $student->picture) }}" class="rounded-circle" width="50" height="50" /></td>
                                            <td>{{$student->firstname}} {{$student->lastname}}</td>
                                            <td>{{$student->class}}</td>
                                            <td>{{$student->description}}</td>
                                            <td>
                                                <a href="{{route('backFolloUp',$student->id)}}"​​ class="btn btn-warning">Back</a>
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
@endsection