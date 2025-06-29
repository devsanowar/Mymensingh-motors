@extends('website.layouts.app')
@section('title', 'Blog Page')
@section('website_content')
    <!--Breadcrumb section-->
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>Blog Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->


    <!--shop area start-->
    <div class="blog_area blog_sidebar pt-105 pb-100 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12">
                    @include('website.layouts.blog_left_sidebar')
                </div>
                <div class="col-lg-8 col-md-12 col-12 blog_details_content">
                    <div class="row">
                        @forelse ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single_blog_post mb-40">
                                    <div class="post_thumbnail">
                                        <a href="{{ route('blog_single.page', $blog->post_slug) }}"><img src="{{ asset($blog->image) }}" alt=""></a>
                                    </div>
                                    <div class="post_content_meta">
                                        <div class="post_meta">
                                            <ul>
                                                <li>Posted {{ $blog->created_at->format('F j') }}.</li>
                                                <li>
                                                    @if ($blog->views >= 1000)
                                                        {{ floor($blog->views / 1000) }}k+ View
                                                    @else
                                                        {{ $blog->views }} View
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        @if ($blog->likes()->count() >= 1000)
                                                            {{ number_format($blog->likes()->count() / 1000, 1) }}k+ Like
                                                        @else
                                                            {{ $blog->likes()->count() }} Like
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="blog_post_desc">
                                            <h2><a href="{{ route('blog_single.page', $blog->post_slug) }}">{{ Str::limit($blog->post_content, 50, '...') }}</a></h2>
                                            <p>{!! Str::limit($blog->post_content, 50, '...') !!}</p>
                                        </div>
                                        <div class="read_more_btn">
                                            <a href="{{ route('blog_single.page', $blog->post_slug) }}">Read More <span><i
                                                        class="zmdi zmdi-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Blog post not found....</p>
                        @endforelse


                    </div>
                </div>
            </div>
            <div class="row pagination_box mt-30">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i> prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="active">4</li>
                            <li>..</li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">next<i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shop area end-->
@endsection
