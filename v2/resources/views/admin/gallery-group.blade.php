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
                    <form method="POST" action="{{ url('save-gallery-multiple-image') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery') }}</label>

                            <div class="col-md-6">
                                <select name="gallery" class="form-control">
                                    <option value="">Select one</option>
                                    @if($galleriess)
                                    @foreach($galleriess as $gallery)
                                        <option value="{{ $gallery->id }}">{{ $gallery->gallery_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gallery Group Image') }}</label>

                            <div class="col-md-6">
                                <input id="gallery_group_image" type="file" multiple class="form-control" name="gallery_group_image[]">
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
                				<th>No. of Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($galleries))
                			@foreach($galleries as $gallery)
                			<tr>
                				<td>{{ $gallery->gallery_name }}</td>
                				<td>
                                    @php
                                    $images = explode(',', $gallery->image);
                                    @endphp
                                    {{ count($images) }}
                                    <ul class="list-group">
                                    </ul>
                				</td>
                				<td><a href="javascript:void(0)" onclick="deleteGroupGallery({{ $gallery->id }})" class="btn btn-danger" id="row-{{ $gallery->id }}"><i class="fas fa-trash"></i></a></td>
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
    function deleteGroupGallery(id) {
        var con = confirm('Do you want to delete this?')
        if(con){
            $.ajax({
                url:'{{ url("delete-group-gallery") }}',
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