@extends('layouts.header');
@section('header')
<div class="container" style="margin-top: 5%">
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form action="" enctype="multipart/form-data" >
                            @csrf
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <img src="{{ URL::to('/') }}/Images/{{ $showIdStudent->picture }}" class="rounded-circle" width="80" height="80" />                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('FirstName :') }}</label>
                                <div class="col-md-6">
                                    <p><span>{{$showIdStudent->firstname}}</span></p>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('LastName :') }}</label>
                                <div class="col-md-6">
                                    <p><span>{{$showIdStudent->lastname}}</span></p>        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class :') }}</label>
                                <div class="col-md-6">
                                    <p><span>{{$showIdStudent->class}}</span></p>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Description :') }}</label>
                                <div class="col-md-6">
                                    <p><span>{{$showIdStudent->description}}</span></p>                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    {{-- colunm of add comment --}}
                    <div class="col-6">
                        <form action="{{route('addComment',$showIdStudent->id)}}" method="POST">
                            {{csrf_field()}}
                            @csrf
                            <div class="form-group">
                                <h3>Give Your Comment</h3>
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" name="comments" rows="5" id="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Save Comment</button>
                        </form><br>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- display comment --}}
        <div class="card-header mt-5">
            <h6>Comments :</h6>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                       @foreach ($comments as $comment)
                       <div class="well">
                        <i><b>By : {{ $comment->user->firstname }} </b></i>&nbsp;&nbsp;
                        <div class="card bg-light text-dark">
                            <div class="card-body">{{ $comment->comment }}</div>
                          </div>
                        <div style="margin-left:10px;">
                            <form action="{{route('comment.destroy',$comment ->id)}}" method="POST">
                                <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-primary"> Edit</a>
                                @csrf
                                @method('DELETE')
                               
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script> --}}