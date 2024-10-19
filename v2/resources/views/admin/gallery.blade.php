@extends('layouts.app')
@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Gallery') }}</div>

                <div class="card-body">
                	@include('admin.includes.message')
                	@include('admin.includes.errors')
                    <form method="POST" action="{{ url('save-gallery') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Name') }}</label>

                            <div class="col-md-6">
                                <input id="gallery_name" type="text" class="form-control{{ $errors->has('gallery_name') ? ' is-invalid' : '' }}" name="gallery_name" value="{{ old('gallery_name') }}" required autofocus>

                                @if ($errors->has('gallery_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gallery_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Title Image') }}</label>

                            <div class="col-md-6">
                                <input id="gallery_image" type="file" class="form-control{{ $errors->has('gallery_image') ? ' is-invalid' : '' }}" name="gallery_image" value="{{ old('gallery_image') }}" required autofocus>

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
                <div class="card-header">{{ __('Gallery List') }}</div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>Gallery Name</th>
                				<th>Gallery Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($galleries))
                			@foreach($galleries as $gallery)
                			<tr>
                				<td>{{ $gallery->gallery_name }}</td>
                				<td>
                					<img height="100" width="100" src="{{ asset('uploads/gallery').'/'.$gallery->gallery_name.'/'.$gallery->gallery_image }}">
                				</td>
                				<td>
                                    <a href="{{ url('edit-gallery').'/'.$gallery->id }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteGallery('{{ $gallery->id }}')" class="btn btn-danger" id="row-{{ $gallery->id }}"><i class="fas fa-trash"></i></a>
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
    function deleteGallery(id) {
        var con = confirm('Do you want to delete this gallery? If you delete this gallery then it\'s group image will be deleted.');
        if(con){
            $.ajax({
                url:'{{ url("delete-gallery") }}',
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
</script>
@endsection