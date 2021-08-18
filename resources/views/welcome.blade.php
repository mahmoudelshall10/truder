<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="{{ settings('description') }}" />
        <meta name="author" content="{{ settings('author') }}" />
        <title>{{ settings('name') }}</title>
        <link rel="shortcut icon" href="{{ settings('icon') }}" />

        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />

        <!-- css assets -->
        <link href="{{ url('site_design') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/icofont.min.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/animate.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/mainmenu.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/magnific-popup.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/slick.min.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/style.css" rel="stylesheet" />
        <link href="{{ url('site_design') }}/assets/css/responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>

                <!-- ================== -->
        <!-- page-wrapper start -->
        <div class="page-wrapper" id="app">
            <!-- Preloader -->
             <div class="preloader"></div>

             <header-component :phone={{ settings('phone') }} logo="{{url('/').'/'.settings('logo')}}" :site_name="{{ settings('name') }}"></header-component>
             <!-- ================== -->
             <!-- site-content start -->
             <main class="site-content">
                <index></index>
            </main>
            <!-- site-content end -->
            <!-- ================ -->
            
            <!-- ============ -->
            <!-- footer start -->
            <footer-component></footer-component>
             <!-- footer end -->
             <!-- ========== -->
         </div>
         <!-- page-wrapper end -->
         <!-- ================ -->

        <div class="scroll-to-top" data-target="html">
            <i class="icofont-arrow-up"></i>
        </div>
        <!-- /.back2Top button -->

        <!-- js assets -->
        <script src="{{ url('site_design') }}/assets/js/jquery-3.5.1.min.js"></script>
        <script src="{{ url('site_design') }}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('site_design') }}/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ url('site_design') }}/assets/js/jquery.parallax-scroll.js"></script>
        <script src="{{ url('site_design') }}/assets/js/slick.min.js"></script>
        <script src="{{ url('site_design') }}/assets/js/wow.min.js"></script>
        <script src="{{ url('site_design') }}/assets/js/main.js"></script>
    </body>
</html>
