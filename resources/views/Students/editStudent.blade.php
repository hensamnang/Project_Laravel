@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center  mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit Student') }}</div>

                <div class="card-body">
                    <form action="{{route('student.update',$editStudent->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('FirstName :') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$editStudent->firstname}}" required autocomplete="name" autofocus>

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
                                <input id="name" type="text" class="form-control @error('lasstname') is-invalid @enderror" name="lastname" value="{{$editStudent->lastname}}" required autocomplete="name" autofocus>

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
                                <select  class ="form-control"  name="class" id="grade">
                                    @if ($editStudent->class)
                                        <option value="{{$editStudent->class}}" selected>{{$editStudent->class}}</option>
                                        <option value="WEP_A">WEP_A</option>
                                        <option value="WEP_B">WEP_B</option>
                                        <option value="SNA">SNA</option>
                                        <option value="2021_A">2021_A</option>
                                        <option value="2021_B">2021_B</option>
                                        <option value="2021_C">2021_C</option>
                                    @endif
                                </select>
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
                                <textarea class="textarea" name="description" class="form-control" placeholder="Your description">
                                    {{$editStudent->description}}
                                </textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Your Picture :') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="image" />
                                    <img src="{{ URL::to('/') }}/Images/{{ $editStudent->picture }}" class="rounded-circle" width="50" height="50" />
                                    <input type="hidden" name="hidden_image" value="{{ $editStudent->picture}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('UPDATE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
