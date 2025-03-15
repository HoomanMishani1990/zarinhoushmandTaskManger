<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>ToDo - Frest - Bootstrap HTML admin template</title>
        <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors-rtl.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/daterange/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.snow.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/dragula.min.css">
        <!-- END: Vendor CSS-->
    
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/themes/semi-dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/custom-rtl.css">
        <!-- END: Theme CSS-->
    
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/pages/app-todo.css">
        <!-- END: Page CSS-->
    
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
        <!-- END: Custom CSS-->
    
    </head>








<body class="vertical-layout vertical-menu-modern content-left-sidebar todo-application navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
   

   


    




    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.partials.sidebar')
            
            <div class="layout-page">
                @include('layouts.partials.navbar')
                
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @if(session('success'))
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>


        <!-- BEGIN: Vendor JS-->
        <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
        <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
        <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
        <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
        <!-- BEGIN Vendor JS-->
    
        <!-- BEGIN: Page Vendor JS-->
        <script src="../../../app-assets/vendors/js/pickers/daterange/moment.min.js"></script>
        <script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
        <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
        <script src="../../../app-assets/vendors/js/editors/quill/quill.min.js"></script>
        <script src="../../../app-assets/vendors/js/extensions/dragula.min.js"></script>
        <!-- END: Page Vendor JS-->
    
        <!-- BEGIN: Theme JS-->
        <script src="../../../app-assets/js/scripts/configs/vertical-menu-light.js"></script>
        <script src="../../../app-assets/js/core/app-menu.js"></script>
        <script src="../../../app-assets/js/core/app.js"></script>
        <script src="../../../app-assets/js/scripts/components.js"></script>
        <script src="../../../app-assets/js/scripts/footer.js"></script>
        <!-- END: Theme JS-->
    
        <!-- BEGIN: Page JS-->
        <script src="../../../app-assets/js/scripts/pages/app-todo.js"></script>
    <!-- END: Page JS-->


</body>
<!-- END: Body-->

</html>