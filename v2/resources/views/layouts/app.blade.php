<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Utsab</title>  


    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if (Auth::check())
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <a class="navbar-brand" href="{{ url('/home') }}">Utsab</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('add-slider') }}" role="button" aria-haspopup="true" aria-expanded="false">
                  Slider
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Executive Committee
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('add-executive-committee') }}"> {{ __('Add Executive Committee') }}</a> 
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Puja Schedule
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('add-puja') }}"> {{ __('Add Puja') }}</a> 
                  <a class="dropdown-item" href="{{ route('add-puja-header') }}"> {{ __('Add Puja Heading') }}</a> 
                  <a class="dropdown-item" href="{{ route('add-puja-schedule') }}"> {{ __('Add Puja Schedule') }}</a> 
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('add-gallery') }}"> {{ __('Gallery Category') }}</a> 
                  <a class="dropdown-item" href="{{ url('gallery-multiple-image') }}">{{ __('Gallery Group Image') }}</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(Auth::user()->role == 0)
                      <a class="dropdown-item" href="{{ route('register') }}">{{ __('Create User') }}</a>
                     @endif
                  <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>                    
                </div>
              </li>
            </ul>
          </div>
        </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('backend/datatables/js/jquery.dataTables.min.js') }}"></script>

    <script type="text/javascript">
      $(function () {

        // SET UP CSRF TOKEN Globally for Ajax Request 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

   });

      $(document).ready(function() {
          $('.utsab-datatable').DataTable();
      } );
    </script>  
</body>
</html>
