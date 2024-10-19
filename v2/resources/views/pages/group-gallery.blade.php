@extends('layouts.sites')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">{{ $gallery->gallery_name }}</h1>
         <ul class="pull-right breadcrumb">
            <li><a href="{{ url()->previous() }}">Back Gallery</a></li>
        </ul>
    </div>
    <!--/container-->
</div>
<!-- container content -->
<div class="container content">
    @php
        $galleryLists = explode(',', $gallery->image);

    @endphp
        <div class="row  margin-bottom-30">
            @foreach($galleryLists as $key => $galleryList)
            <div class="col-sm-3 sm-margin-bottom-30">
                <a href="{{ url('uploads/gallery/'.$gallery->gallery_name.'/group/'.$galleryList) }}" rel="gallery2" class="fancybox img-hover-v1" title="Durga Puja 2012">
                    <span><img class="img-responsive" src="{{ url('uploads/gallery/'.$gallery->gallery_name.'/group/'.$galleryList) }}" alt="Durga Puja 2012"></span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
<!-- End container content -->
@endsection