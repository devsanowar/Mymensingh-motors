@extends('website.layouts.app')
@section('title', 'Single Post')
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
                            <li><a href="{{ route('blog.page') }}">blog</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>{{ $singleBlogPage->post_title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->


    <!--Our blob page-->
    <div class="our_blog_area single_blog right_sidebar ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="post_details_inner">
                        <div class="single_post_thumbnail">
                            <img src="{{ asset($singleBlogPage->image) }}" alt="single post thumbail">
                        </div>
                        <div class="single_post_content">
                            <div class="single_post_top_contnt">
                                <div class="single_post_title">
                                    <h2>{{ $singleBlogPage->post_title }}</h2>
                                </div>
                                <div class="single_post_meta">
                                    <div class="single_post_left_meta">
                                        <ul>
                                            <li>{{ $singleBlogPage->created_at->format('M j, Y') }}</li>
                                            <li>By: {{ $singleBlogPage->user_name }}</li>
                                            <li>{{ $singleBlogPage->category->category_name }}</li>
                                        </ul>
                                    </div>
                                    <div class="single_post_right_meta">
                                        <ul>
                                            <li style="margin-top: 8px;">2 Comments</li>
                                            <li><button id="like-btn" class="like-btn"
                                                    data-post="{{ $singleBlogPage->id }}"
                                                    data-liked="{{ $singleBlogPage->isLikedBySession() ? 'true' : 'false' }}">
                                                    <i class="fa-solid fa-thumbs-up"></i>
                                                    <span id="like-count">{{ $singleBlogPage->likes()->count() }}</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="post_excerpt">
                                <p>{!! $singleBlogPage->post_content !!}</p>
                            </div>

                            <!--administrator start-->
                            {{-- <div class="administrator">
                                <div class="administrator_thumb">
                                    <img src="{{ asset('frontend') }}/assets/img/blog/author.png" alt="">
                                </div>
                                <div class="administrator_contnet">
                                    <h4>Mark Anderson</h4>
                                    <p>Using the examples above, if you’re making a business website consider asking
                                        users to add themselves to an email list in order to receive updatesas leads
                                        for future sales.</p>
                                    <div class="administrator_social_icon">
                                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                        <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                        <a href="#"><i class="zmdi zmdi-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                            <!--administrator end-->
                        </div>

                        <!--Comment box -->
                        <div class="comment_box_form mt-80">
                            <div class="comment_box_title">
                                <h3>Leave A Comment</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <div class="leave_comment_form">
                                <form action="#">
                                    <div class="text-areabox">
                                        <textarea placeholder="Type Your Comment *"></textarea>
                                    </div>
                                    <div class="input_box half_left">
                                        <input type="text" placeholder="Your Name *">

                                    </div>
                                    <div class="input_box half_right">
                                        <input type="email" placeholder="Your Email *">
                                    </div>
                                    <div class="input_box">
                                        <input type="text" placeholder="Your Website">
                                    </div>
                                    <div class="submit_button_inner">
                                        <button type="submit">Submit Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Comment box end-->

                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-12">
                    @include('website.layouts.pages.blog.single_post_sidebar')
                </div>
            </div>

        </div>
    </div>
    <!--Our blob page end-->
@endsection

@push('scripts')
    <script>
        $('#like-btn').click(function() {
            var postId = $(this).data('post');
            var token = '{{ csrf_token() }}';

            $.ajax({
                url: '/post/' + postId + '/like',
                type: 'POST',
                data: {
                    _token: token
                },
                success: function(data) {
                    $('#like-count').text(data.count);
                    if (data.liked) {
                        $('#like-btn').attr('data-liked', 'true');
                    } else {
                        $('#like-btn').attr('data-liked', 'false');
                    }
                }
            });
        });
    </script>
@endpush
