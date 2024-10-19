@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Puja Schedule') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ route('update-puja-schedule') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $puja_schedule->id }}">
                        
                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right">{{ __('Puja Name') }}</label>

                            <div class="col-md-6">
                                <select name="puja_name" class="form-control">
                                    <option value="">Select one</option>
                                    @if($pujas)
                                    @foreach($pujas as $puja)
                                        <option value="{{ $puja->id }}" {{ ($puja_schedule->puja_id == $puja->id)?'selected':'' }}>{{ $puja->puja_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_name
                            " class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" value="{{ $puja_schedule->event_name }}" required autofocus>

                                @if ($errors->has('event_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ $puja_schedule->date }}" required autofocus>

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timings" class="col-md-4 col-form-label text-md-right">{{ __('Timings') }}</label>

                            <div class="col-md-6">
                                <input id="timings" type="text" class="form-control{{ $errors->has('timings') ? ' is-invalid' : '' }}" name="timings" value="{{ $puja_schedule->timings }}" required autofocus>

                                @if ($errors->has('timings'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('timings') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activities" class="col-md-4 col-form-label text-md-right">{{ __('Activities') }}</label>

                            <div class="col-md-6">
                                <input id="activities" type="text" class="form-control{{ $errors->has('activities') ? ' is-invalid' : '' }}" name="activities" value="{{ $puja_schedule->activities }}" required autofocus>

                                @if ($errors->has('activities'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activities') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prasadam" class="col-md-4 col-form-label text-md-right">{{ __('Prasadam') }}</label>

                            <div class="col-md-6">
                                <input id="prasadam" type="text" class="form-control{{ $errors->has('prasadam') ? ' is-invalid' : '' }}" name="prasadam" value="{{ $puja_schedule->prasadam }}" required autofocus>

                                @if ($errors->has('prasadam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prasadam') }}</strong>
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