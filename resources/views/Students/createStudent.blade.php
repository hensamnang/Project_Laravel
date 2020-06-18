@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center  mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Add Student') }}</div>

                <div class="card-body">
                    <form action="{{route('student.store')}}" method="POST" >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('FirstName :') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="" required autocomplete="name" autofocus>

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
                                <input id="name" type="text" class="form-control @error('lasstname') is-invalid @enderror" name="lastname" value="" required autocomplete="name" autofocus>

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
                                {{-- <input id="name" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="" required autocomplete="name" autofocus> --}}
                                <select class="form-control" name="class" id="grade">
                                    <option value="">select_class</option>
                                    <option value="WEP_A">WEP_A</option>
                                    <option value="WEP_B">WEP_B</option>
                                    <option value="SNA">SNA</option>
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
                                <textarea class="textarea" name="description" placeholder="Your description"></textarea>
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
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SAVE') }}
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
