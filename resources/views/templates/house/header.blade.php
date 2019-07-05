<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{$title}}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{getenv('URL_TEMPLATES_HOUSE')}}/img/core-img/favicon.ico">
    <script src="{{getenv('URL_TEMPLATES_HOUSE')}}/js/jquery/jquery-2.2.4.min.js"></script>

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{getenv('URL_TEMPLATES_HOUSE')}}/style.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">contact@southtemplate.com</a>
                </div>

                <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a href="tel:+45 677 8993000 223">+45 677 8993000 223</a>

                        <img class="logo_language" src="http://www.iotcoworkingspace.com/frontend/images/ic-vi.svg">
                            <a class="language" href="{{ url('language/vn') }}"><i style="margin-right: 1em;" class="fa fa-language"></i>VN</a>
                        <img class="logo_language" src="http://www.iotcoworkingspace.com/frontend/images/ic-en.svg">
                            <a class="language" href="{{ url('language/en') }}"><i style="margin-right: 1em;" class="fa fa-language"></i>EN</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ route('house.index.index') }}"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('house.index.index') }}">{{ __('message.HOME') }}</a></li>
                                <li><a href="about-us.html">{{ __('message.ABOUT') }}</a></li>
                                <li><a href="{{ route('house.blog.index') }}">{{ __('message.BLOG') }}</a></li>
                                <li><a href="#">{{ __('message.MENU') }}</a>
                                    <div class="megamenu">
                                    @foreach ($objChoose->chunk(1) as $chunk)
                                        <ul class="single-mega cn-col-3">
                                            @foreach ($chunk as $value)
                                                <li style="text-align: center;" class="title">
                                                    <a href="{{ route('house.cat.choose_product',strtolower($value->name)) }}">@if (session::get('locale') == "en"){{$value->name}}@else{{$value->name_vn }}@endif </a>
                                                </li>
                                            @foreach ($objCollection as $product)
                                                @php
                                                    $arr = [
                                                        'name'  => str_slug ($product->name),
                                                        'name1' => strtolower($value->name),
                                                    ]
                                                @endphp
                                                 <li><a href="{{ route('house.cat.choose_collection',$arr) }}">@if (session::get('locale') == "en"){{$product->name }}@else{{$product->name_vn }}@endif</a>
                                                 </li>
                                            @endforeach
                                            @endforeach
                                        </ul>
                                    @endforeach
                                        <ul class="single-mega cn-col-3">
                                            <li style="text-align: center;" class="title">
                                                <a href="{{ route('house.blog.project.index') }}">{{ __('message.PROJECT') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="{{ route('house.contact.index') }}">{{ __('message.CONTACT') }}</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="{{ route('house.index.search')}}" method="get">
                                    <input type="search" required="" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
