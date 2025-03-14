<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}">

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css">
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css">
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/rtl.css') }}">

        @stack('styles')
    </head>
    <body>
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

        <!-- Core JS -->
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

        @stack('scripts')

        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
