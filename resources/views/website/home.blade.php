@extends('website.layouts.app')
@section('title', 'Home')
@section('website_content')
    <!-- slider-area-start -->
    <div class="slider_wrapper">
        @include('website.layouts.pages.home.slider')
    </div>
    <!-- slider-area-end -->


    <!-- Categories Product start -->
    <div class="product-categories">
        @include('website.layouts.pages.home.category')
    </div>
    <!-- Categories Product end -->


    <!--Available parts area start-->
    <div class="banner_area pt-50">

        @include('website.layouts.pages.home.brand')

    </div>
    <!--Available parts area end-->


    <!-- Featured Product start -->
    @include('website.layouts.pages.home.featured-product')
    <!-- Featured Product end -->

    <!--Latest product start-->
    @include('website.layouts.pages.home.product-by-category')
    <!--Latest product end-->




    <!--Banner product section-->
    @include('website.layouts.pages.home.promobanner-product')
    <!--Banner product section end-->


    <!--Full Width  banner cta start-->
    @include('website.layouts.pages.home.cta')
    <!--Full Width Banner cta end-->

    <!--Latest Post start-->
    @include('website.layouts.pages.home.blog')
    <!--Latest Post end-->


@endsection
