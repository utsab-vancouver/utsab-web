@extends('layouts.sites')
@section('content')
<!-- container content -->
<div class="container content">
    <div class="row margin-bottom-40">
        <div class="col-md-9 md-margin-bottom-40">
            <div class="text-center">
                <h1>{{ $puja_header->title }}</h1>
                <h4>{{ $puja_header->address }}</h4>
            </div>

            @if(isset($pujaschedules))
            @foreach($pujaschedules as $key => $pujaschedule)

            <div class="panel panel-warning margin-bottom-40 text-center">
                <div class="panel-heading ">
                    <h3 class="panel-title">{{ $key }}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">Event</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Timings</th>
                                <th class="text-center">Activities</th>
                                <th class="text-center">Prasadam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Saraswati Puja -->
                            @foreach($pujaschedule as $keys => $ps)
                            <tr>
                                <td class="text-center">{{ $ps['event_name'] }}</td>
                                <td class="text-center">{{ $ps['date'] }}</td>
                                <td class="text-center">{{ $ps['timings'] }}</td>
                                <td class="text-center">{{ $ps['activities'] }}</td>
                                <td class="text-center">{{ $ps['prasadam'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @endforeach
            @endif

        </div>
        <div class="col-md-3">
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="{{ url('frontend/assets/img/main/durga.png') }}">
            </div>
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="{{ url('frontend/assets/img/main/kali.png') }}">
            </div>
            <div class="col-md-12 margin-top-40">
                <img class="img-responsive" src="{{ url('frontend/assets/img/main/saraswati.png') }}">
            </div>
        </div>
    </div>
</div>
<!-- End container content -->
@endsection