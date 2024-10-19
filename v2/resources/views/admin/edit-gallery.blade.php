@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gallery') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ url('update-gallery') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $gallery->id }}">
                        <input type="hidden" name="gallery_name_old" value="{{ $gallery->gallery_name }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Name') }}</label>

                            <div class="col-md-6">
                                <input id="gallery_name" type="text" class="form-control{{ $errors->has('gallery_name') ? ' is-invalid' : '' }}" name="gallery_name" value="{{ $gallery->gallery_name }}" required autofocus>

                                @if ($errors->has('gallery_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gallery_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center" style="margin-bottom: 20px;">
                                <label>Old Image</label>
                                <input type="hidden" name="gallery_image_old" value="{{ $gallery->gallery_image }}">
                                <br />
                                <img height="100" width="100" src="{{ asset('uploads/gallery').'/'.$gallery->gallery_name.'/'.$gallery->gallery_image }}">
                            </div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Title Image') }}</label>
                            <div class="col-md-6">
                                <input id="gallery_image" type="file" class="form-control{{ $errors->has('gallery_image') ? ' is-invalid' : '' }}" name="gallery_image" value="{{ old('gallery_image') }}" autofocus>

                                @if ($errors->has('gallery_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gallery_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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