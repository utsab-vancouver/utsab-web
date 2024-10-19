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
                    <form method="POST" action="{{ route('save-puja-schedule') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right">{{ __('Puja Name') }}</label>

                            <div class="col-md-6">
                                <select name="puja_name" class="form-control">
                                    <option value="">Select one</option>
                                    @if($pujas)
                                    @foreach($pujas as $puja)
                                        <option value="{{ $puja->id }}">{{ $puja->puja_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" value="{{ old('event_name') }}" required autofocus>

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
                                <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" autofocus>

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
                                <input id="timings" type="text" class="form-control{{ $errors->has('timings') ? ' is-invalid' : '' }}" name="timings" value="{{ old('timings') }}" autofocus>

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
                                <input id="activities" type="text" class="form-control{{ $errors->has('activities') ? ' is-invalid' : '' }}" name="activities" value="{{ old('activities') }}" autofocus>

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
                                <input id="prasadam" type="text" class="form-control{{ $errors->has('prasadam') ? ' is-invalid' : '' }}" name="prasadam" value="{{ old('prasadam') }}" autofocus>

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
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top: 30px;">
            <div class="card">
                <div class="card-header">{{ __('List') }}</div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                                <th>S/N</th>  
                                <th>Puja Name</th>  
                                <th>&nbsp;</th>              				
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($pujaschedules))
                            @php
                                $i = 0;
                            @endphp
                			@foreach($pujaschedules as $key => $pujaschedule)
                            @php
                                $i++;
                            @endphp
                			<tr>
                                <td>{{ $i }}</td>
                                <td>{{ $key }}</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Event</th>
                                            <th>Date</th>
                                            <th>Timings</th>
                                            <th>Activities</th>
                                            <th>Prasadam</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach($pujaschedule as $keys => $ps)
                                            <tr>
                                                <td>{{ $keys + 1 }}</td>
                                                <td>{{ $ps['event_name'] }}</td>
                                                <td>{{ $ps['date'] }}</td>
                                                <td>{{ $ps['timings'] }}</td>
                                                <td>{{ $ps['activities'] }}</td>
                                                <td>{{ $ps['prasadam'] }}</td>
                                                <td style="width: 15%" class="text-center">
                                                    <a href="{{ route('edit-puja-schedule', ['id' => $ps['id']]) }}" class="btn btn-xs btn-outline-info"><i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" onclick="deletePuja({{ $ps['id'] }})" class="btn btn-xs btn-danger" id="row-{{ $ps['id'] }}"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                			</tr>
                			@endforeach
                			@endif
                		</tbody>
                	</table>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deletePuja(id) {
        var con = confirm('Do you want to delete this puja?');
        if(con){
            $.ajax({
                url:'{{ url("delete-puja-schedule") }}',
                method:'POST',
                data: {'id': id},
                success: function (response){
                    var data = $.parseJSON(response);

                    if(data.response == 1){

                        alert('Request completed successfully.')
                        if(data.total == '0'){
                            $("#row-"+id).parent().parent().parent().parent().parent().parent().remove();
                        }else{
                            $("#row-"+id).parent().parent().remove();
                        }

                    }else {
                        alert('Request failed!!')
                    }
                }
            });
        }
    }





</script>
@endsection