@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Puja') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ route('update-puja') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $puja->id }}">

                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right">{{ __('Puja Name') }}</label>

                            <div class="col-md-6">
                                <input id="puja_name" type="text" class="form-control{{ $errors->has('puja_name') ? ' is-invalid' : '' }}" name="puja_name" value="{{ $puja->puja_name }}" required autofocus>

                                @if ($errors->has('puja_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('puja_name') }}</strong>
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