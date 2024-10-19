<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Utsab</title>  


    

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('fontawesome/css/all.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/datatables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <?php if(Auth::check()): ?>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">Utsab</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('add-slider')); ?>" role="button" aria-haspopup="true" aria-expanded="false">
                  Slider
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Executive Committee
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('add-executive-committee')); ?>"> <?php echo e(__('Add Executive Committee')); ?></a> 
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Puja Schedule
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('add-puja')); ?>"> <?php echo e(__('Add Puja')); ?></a> 
                  <a class="dropdown-item" href="<?php echo e(route('add-puja-header')); ?>"> <?php echo e(__('Add Puja Heading')); ?></a> 
                  <a class="dropdown-item" href="<?php echo e(route('add-puja-schedule')); ?>"> <?php echo e(__('Add Puja Schedule')); ?></a> 
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(url('add-gallery')); ?>"> <?php echo e(__('Gallery Category')); ?></a> 
                  <a class="dropdown-item" href="<?php echo e(url('gallery-multiple-image')); ?>"><?php echo e(__('Gallery Group Image')); ?></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e(Auth::user()->name); ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php if(Auth::user()->role == 0): ?>
                      <a class="dropdown-item" href="<?php echo e(route('register')); ?>"><?php echo e(__('Create User')); ?></a>
                     <?php endif; ?>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>                    
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <?php endif; ?>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="<?php echo e(asset('js/jquery-3.3.1.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/datatables/js/jquery.dataTables.min.js')); ?>"></script>

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
