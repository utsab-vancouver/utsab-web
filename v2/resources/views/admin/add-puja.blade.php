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
                    <form method="POST" action="{{ route('save-puja') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right">{{ __('Puja Name') }}</label>

                            <div class="col-md-6">
                                <input id="puja_name" type="text" class="form-control{{ $errors->has('puja_name') ? ' is-invalid' : '' }}" name="puja_name" value="{{ old('puja_name') }}" required autofocus>

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
                <div class="card-header">{{ __('Puja List') }}</div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>S/N</th>
                				<th>Puja Name</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			@if(isset($pujas))
                			@foreach($pujas as $key => $puja)
                			<tr>
                                <td>{{ $key + 1 }}</td>
                				<td>{{ $puja->puja_name }}</td>
                				<td>
                                    <a href="{{ url('edit-puja').'/'.$puja->id }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deletePuja('{{ $puja->id }}')" class="btn btn-danger" id="row-{{ $puja->id }}"><i class="fas fa-trash"></i></a>
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
        var con = confirm('Do you want to delete this puja? If you delete this puja then it\'s related data will be deleted.');
        if(con){
            $.ajax({
                url:'{{ url("delete-puja") }}',
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