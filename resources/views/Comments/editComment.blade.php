@extends('layouts.header')
@section('header')
<div class="container">
    <div class="card-header mt-5">
        <h6>Edit Comments :</h6>
        <div class="card-body">
            <div class="row">
                <div class="col-1"></div>
                    <div class="col-10">
                        <form action="{{route('comment.update',$editComment->id)}}" method="POST">
                            @method('PATCH')
                            @csrf
                        <div class="well">
                            <div class="card bg-light text-dark">
                                <textarea class="form-control" name="comments" rows="5" value="">{{$editComment->comment}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-right">Update</button>
                        <a href="{{route('comment.show',$editComment->id)}}"><button type="submit" class="btn btn-warning mt-3 float-right">Back</button></a>
                        </form>
                    </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</div>
@endsection