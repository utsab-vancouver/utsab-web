@extends('layouts.sites')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">Gallery</h1>
    </div>
    <!--/container-->
</div>
<!-- container content -->
<div class="container">
    <div class="row margin-top-20">
        @if(isset($galleries))
        @foreach($galleries as $gallery)
        <div class="col-sm-3">
            <div class="caption-overlay">
                <figure><a href="{{ url('gallery-show'.'/'.$gallery->id) }}"><img class="img-responsive img-thumbnail" src="{{ url('uploads/gallery/'.$gallery->gallery_name.'/'.$gallery->gallery_image) }}" alt=""> </a></figure>
                <div class="caption bottom-right">
                    <div class="title">
                        <h3 class="main-title layer">{{ $gallery->gallery_name }}</h3>
                    </div>
                    <!--/.title -->
                </div>
                <!--/.caption -->
            </div>
        </div>
        @endforeach
        @endif
        
    </div>
</div>
<!-- End container content -->
@endsection