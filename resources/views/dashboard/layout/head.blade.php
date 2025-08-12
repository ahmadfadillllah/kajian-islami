<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="{{ config('app.name') }}" />
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('home') }}/assets/images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('home') }}/assets/images/logo.png" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet" />
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/vendors/flag-icon.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/icons/css/uicons-regular-rounded.css" />
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/iconly-icon.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/bulk-style.css" />
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/themify.css" />
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/fontawesome-min.css" />
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/weather-icons/weather-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/intltelinput.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/tagify.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/select2.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/ss/vendors/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/slick.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets') }}/css/vendors/slick-theme.css" />
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/style.css" />
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/color-1.css" media="screen" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>

<body>

    <div class="tap-top"><i data-feather="arrow-up"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('notification')
