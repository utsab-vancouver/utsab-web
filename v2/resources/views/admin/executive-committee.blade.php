@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Executive Committee') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ url('save-executive-committee') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" autofocus>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
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
                <div class="card-header">{{ __('Slider List') }}</div>

                <div class="card-body">
                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Image</th>
                				<th>Title</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($executives))
                			@foreach($executives as $key => $executive)
                			<tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $executive->name }}</td>
                                <td class="text-center">
                                    @if($executive->image == NULL || $executive->image == '')
                                    <img height="130" width="100" src="{{ asset('backend/img/no-image.png') }}">
                                    @else
                                    <img height="130" width="100" src="{{ asset('uploads/executive').'/'.$executive->image }}">
                                    @endif
                                </td>
                                <td>{{ $executive->title }}</td>
                				<td>
                                    <a href="javascript:void(0)" onclick="checkStatus('{{ $executive->id }}')" class="btn btn-{{ ($executive->is_active == 1)?'primary':'secondary' }}" id="row-{{ $executive->id }}"><i class="fas fa-check-circle"></i></a>
                                    <input type="hidden" name="status" value="{{ $executive->is_active }}" id="status-{{ $executive->id }}">
                                    <a href="{{ url('edit-executive').'/'.$executive->id }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteExecutive('{{ $executive->id }}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    function deleteExecutive(id) {
        var con = confirm('Do you want to delete this?');
        if(con){
            $.ajax({
                url:'{{ route("delete-executive") }}',
                method:'POST',
                data: {'id': id},
                success: function (response){
                    if(response == 1){
                        alert('Request completed successfully.')
                        $("#row-"+id).parent().parent().remove();
                    }else {
                        alert('Request failed!!')
                    }
                }
            });
        }
    }

    function checkStatus(id) {
        var is_active = $("#status-"+id).val();
        var con  = confirm('Do you want to change this status?')
        if(con){
            $.ajax({
                url:'{{ route("executive-status") }}',
                method:'POST',
                data:{'id':id, 'is_active':is_active},
                success: function (response) {
                    if(response == 1){
                        var sts = (is_active == 1)?0:1;
                        alert('Request completed successfully.');
                        if(is_active == 1){
                            $("#status-"+id).val(sts);                            
                            $("#row-"+id).removeClass('btn-primary').addClass('btn-secondary');
                        }else {
                            $("#status-"+id).val(sts);                            
                            $("#row-"+id).removeClass('btn-secondary').addClass('btn-primary');
                        }
                    }else {
                        alert('Request failed!!');
                    }
                }
            });
        }
    }
</script>
@endsection