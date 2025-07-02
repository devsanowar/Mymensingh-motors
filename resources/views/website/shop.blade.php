@extends('website.layouts.app')
@section('title', 'Home')
@section('website_content')
<!--Breadcrumb section-->
        <div class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_inner">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><i class="zmdi zmdi-chevron-right"></i></li>
                                <li>{{ $pageTitle }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section end-->


        <!--shop area start-->
        <div class="shop_area ptb-100">
            <div class="container">
                <div class="row">
                    @include('website.layouts.pages.shop.shop-sidebar')
                    

                    @include('website.layouts.pages.shop.shop-product')
                </div>


            </div>
        </div>
        <!--shop area end-->
@endsection
