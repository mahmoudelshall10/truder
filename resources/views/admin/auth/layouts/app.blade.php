
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    {{-- <meta name="description" content="{{SiteSetting('meta_description')}}"> --}}
	  {{-- <meta name="keywords" content="{{SiteSetting('meta_keywords')}}"> --}}
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('page-title')</title>
    <link rel="apple-touch-icon" href="{{url('/').'/'.settings('logo')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/').'/'.settings('icon')}}">

    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/themes/semi-dark-layout.css">
        <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/login_design/assets/css/style.css">
        <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout 1-column navbar-sticky  footer-static blank-page
   light-layout " data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        @yield('content')
        </div>
      </div>
    </div>
    <!-- END: Content-->

    
    <!-- BEGIN: Vendor JS-->
    <script>
        var assetBaseUrl = "{{url('/')}}";
    </script>
    <script src="{{url('/')}}/login_design/vendors/js/vendors.min.js"></script>
    <script src="{{url('/')}}/login_design/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="{{url('/')}}/login_design/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="{{url('/')}}/login_design/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
        <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{url('/')}}/login_design/js/scripts/configs/vertical-menu-light.js"></script>
    <script src="{{url('/')}}/login_design/js/core/app-menu.js"></script>
    <script src="{{url('/')}}/login_design/js/core/app.js"></script>
    <script src="{{url('/')}}/login_design/js/scripts/components.js"></script>
    <script src="{{url('/')}}/login_design/js/scripts/footer.js"></script>
    <script src="{{url('/')}}/login_design/js/scripts/customizer.js"></script>
    <script src="{{url('/')}}/login_design/assets/js/scripts.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
        <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>