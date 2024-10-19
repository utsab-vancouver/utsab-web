@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Slider') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ url('update-slider') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $slider->id }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image') }}</label>

                            <div class="col-md-6">
                                <img height="100" width="150" src="{{ url('uploads/slider/'.$slider->slider_image) }}" style="margin-bottom: 20px;">
                                <br />
                                <input type="hidden" name="slider_image_old" value="{{ $slider->slider_image }}">
                                <input id="slider_image" type="file" class="form-control{{ $errors->has('slider_image') ? ' is-invalid' : '' }}" name="slider_image" value="{{ old('slider_image') }}">

                                @if ($errors->has('slider_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slider_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                                <a href="{{ url()->previous() }}" class="btn btn-primary">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection