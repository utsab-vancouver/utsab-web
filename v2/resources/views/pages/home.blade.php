@extends('layouts.sites')
@section('content')
    <section>
        <div class="row">
        <!-- Begin Content -->
        <div class="col-md-12">
            <!-- Magazine Slider -->
            <div class="carousel slide carousel-v1 margin-bottom-40" id="myCarousel-1">
                <div class="carousel-inner">
                    @if(isset($sliders))
                    @foreach($sliders as $key => $slider)
                    <div class="item {{ ($key == 0)?'active':'' }}">
                        <img alt="" src="{{ url('uploads/slider/'.$slider->slider_image) }}">
                    </div>
                    @endforeach
                    @endif
                    {{-- <div class="item">
                        <img alt="" src="{{ url('frontend/assets/img/sliders/slide2.jpg') }}">
                    </div>
                    <div class="item ">
                        <img alt="" src="{{ url('frontend/assets/img/sliders/slide3.jpg') }}">
                    </div> --}}
                </div>
                <div class="carousel-arrow">
                    <a data-slide="prev" onclick="return false;" href="#myCarousel-1" class="left carousel-control">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a data-slide="next" onclick="return false;" href="#myCarousel-1" class="right carousel-control">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <!-- End s Slider -->
        </div>
        <!-- End Content -->
    </div>
    </section>
    <!--/container-->
    <div class="container">
        <div class="row margin-bottom-30">
            <!-- Welcome Block -->
            <div class="col-md-12 md-margin-bottom-40">
                <div class="headline">
                    <h2>About Utsab </h2></div>
                <p class="text-justify">Utsab is a non-profit community organization in British Columbia. It aims to practice, discuss and promote Bengali festivities. The majority of Utsab community are families of South Asian origin and have started a new life in Lower Mainland. New life brings in new people – next generation of Canadians having Bengali cultural background. Ustab hence promotes learning and practicing Bengali culture among the youngsters. It adopts modern, scientific and logical approach to the challenges and opportunities of existing Bengali community and help newcomers to integrate with the mainstream society and benefit the members through networking. The organization has its own approved constitution and operational procedure. It refrains from any political affiliation and adheres the purpose of the society on a strict non-political basis.</p>
            </div>
            <!--/col-md-12-->
        </div>
    </div>
    <!-- Owl Clients v1 -->
    <!-- photo -->
    <div class="container-fluid ng-scope">
        <div class="row no-gutter aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="{{ url('frontend/assets/img/main/shots-img1.jpg') }}" rel="gallery4" class="fancybox " title=" Event Name">
                    <span><img class="img-responsive" src="{{ url('frontend/assets/img/main/shots-img1.jpg') }}" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="{{ url('frontend/assets/img/main/shots-img2.jpg') }}" rel="gallery4" class="fancybox" title="Event Name">
                    <span><img class="img-responsive" src="{{ url('frontend/assets/img/main/shots-img2.jpg') }}" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="{{ url('frontend/assets/img/main/shots-img3.jpg') }}" rel="gallery4" class="fancybox " title="Event Name">
                    <span><img class="img-responsive" src="{{ url('frontend/assets/img/main/shots-img3.jpg') }}" alt=""></span>
                </a>
            </div>
            <div class="col-sm-3 col-xs-6 col-md-3">
                <a href="{{ url('frontend/assets/img/main/shots-img4.jpg') }}" rel="gallery4" class="fancybox " title="Event Name">
                    <span><img class="img-responsive" src="{{ url('frontend/assets/img/main/shots-img4.jpg') }}" alt=""></span>
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {

        OwlCarousel.initOwlCarousel();
    });
    </script>
@endsection