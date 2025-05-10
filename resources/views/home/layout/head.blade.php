<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="icon" href="{{ asset('home') }}/assets/images/logo.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/swiper-bundle.min.css" />
    <!-- AOS Animation CSS -->
    <link href="{{ asset('home') }}/assets/css/aos.css" rel="stylesheet" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('home') }}/assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
