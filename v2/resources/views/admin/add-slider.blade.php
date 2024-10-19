@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Slider') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ url('save-slider') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Slider Image') }}</label>

                            <div class="col-md-6">
                                <input id="slider_image" type="file" class="form-control{{ $errors->has('slider_image') ? ' is-invalid' : '' }}" name="slider_image" value="{{ old('slider_image') }}" required autofocus>

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
                				<th>Slider Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($sliders))
                			@foreach($sliders as $slider)
                			<tr>
                				<td class="text-center">
                					<img height="100" width="250" src="{{ asset('uploads/slider').'/'.$slider->slider_image }}">
                				</td>
                				<td>
                                    <a href="javascript:void(0)" onclick="checkStatus('{{ $slider->id }}')" class="btn btn-{{ ($slider->is_active == 1)?'primary':'secondary' }}" id="row-{{ $slider->id }}"><i class="fas fa-check-circle"></i></a>
                                    <input type="hidden" name="status" value="{{ $slider->is_active }}" id="status-{{ $slider->id }}">
                                    <a href="{{ url('edit-slider').'/'.$slider->id }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteSlider({{ $slider->id }})" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    function deleteSlider(id) {
        var con = confirm('Do you want to delete this image?');
        if(con){
            $.ajax({
                url:'{{ url("delete-slider") }}',
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
                url:'{{ url("slider-status") }}',
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