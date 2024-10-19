@extends('layouts.sites')
@section('content')

<!-- Management Team -->
<div class="bg-color-light">
    <div class="container content-md" style="padding-top: 40px;">
        <div class="row team-v5">
            <div class="headline">
                <h2>Executive Committee (2018-2019)</h2>
            </div>
            <div class="col-md-12">
                <p>Utsab executive committee is formed every year during an annual general meeting, which is announced and conveyed to all existing members. The executive committee is formed of the following members:-</p>
            </div>
            @if(isset($executives))
            @foreach($executives as $key => $executive)
            <div class="col-md-3 col-sm-6 margin-top-20">
                <div class="team-v2 no-margin-bottom">
                     @if($executive->image == NULL || $executive->image == '')
                    <img class="img-responsive" src="{{ asset('backend/img/no-image.png') }}" alt="photo">
                    @else
                    <img class="img-responsive" src="{{ asset('uploads/executive').'/'.$executive->image }}" alt="photo">
                    @endif

                    
                    <div class="inner-team">
                        <h3>{{ $executive->name }}</h3>
                        <small class="color-green">{{ $executive->title }}</small>
                        <hr>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            
        </div>
        <!--/end team v5-->
    </div>
</div>
<!-- End Management Team -->
@endsection