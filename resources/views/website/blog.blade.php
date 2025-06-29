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
                    <div class="sidebar_right">

                        <div class="sidebar_widget banner mb-65">
                            <div class="sidebar_title">
                                <h3>Search</h3>
                            </div>
                            <div class="sidebar_search">
                                <div class="search_form">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="sidebar_widget recent_post mb-65">
                            <div class="sidebar_title">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="single_recent_post">
                                <div class="recent_post_img">
                                    <a href="#"><img src="{{ asset('frontend') }}/assets/img/blog/latest_1.jpg" alt=""></a>
                                </div>
                                <div class="post_content">
                                    <h3><a href="#">Anxiety disorder affects human life </a></h3>
                                    <span class="post_publist_date">March 3, 2018</span>
                                </div>
                            </div>
                            <div class="single_recent_post">
                                <div class="recent_post_img">
                                    <a href="#"><img src="{{ asset('frontend') }}/assets/img/blog/latest_2.jpg" alt=""></a>
                                </div>
                                <div class="post_content">
                                    <h3><a href="#">Anxiety disorder affects human life</a></h3>
                                    <span class="post_publist_date">March 3, 2018</span>
                                </div>
                            </div>
                            <div class="single_recent_post">
                                <div class="recent_post_img">
                                    <a href="#"><img src="{{ asset('frontend') }}/assets/img/blog/latest_3.jpg" alt=""></a>
                                </div>
                                <div class="post_content">
                                    <h3><a href="#">Anxiety disorder affects human life</a></h3>
                                    <span class="post_publist_date">March 3, 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar_widget cartegories mb-65">
                            <div class="sidebar_title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget_categories">
                                <ul>
                                    <li><a href="#">Adventure Tourers <span class="caet_count">(6)</span></a></li>
                                    <li><a href="#">Learner LAMS <span class="caet_count">(8)</span></a></li>
                                    <li><a href="#"> Minibikes<span class="caet_count">(7)</span></a></li>
                                    <li><a href="#"> Naked<span class="caet_count">(10)</span></a></li>
                                    <li><a href="#">Competition<span class="caet_count">(5)</span></a></li>
                                    <li><a href="#">Trail<span class="caet_count">(12)</span></a></li>
                                    <li><a href="#">Scooters<span class="caet_count">(15)</span></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="sidebar_widget mb-50">
                            <div class="widget_banner">
                                <div class="single_banner">
                                    <a href="#"><img src="{{ asset('frontend') }}/assets/img/banner/5.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar_widget">
                            <div class="widget_title">
                                <h3>Tags</h3>
                            </div>
                            <div class="widget_tags">
                                <ul>
                                    <li><a href="#">bike</a></li>
                                    <li><a href="#">bicycle</a></li>
                                    <li><a href="#">motor</a></li>
                                    <li><a href="#">road bike</a></li>
                                    <li><a href="#">city bike</a></li>
                                    <li><a href="#">cars</a></li>
                                    <li><a href="#">squters</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 blog_details_content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/2.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/3.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/4.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/5.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/6.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/1.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/2.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single_blog_post mb-40">
                                <div class="post_thumbnail">
                                    <a href="blog-details.html"><img src="{{ asset('frontend') }}/assets/img/blog/3.jpg" alt=""></a>
                                </div>
                                <div class="post_content_meta">
                                    <div class="post_meta">
                                        <ul>
                                            <li>Posted March 20.</li>
                                            <li>400+ View </li>
                                            <li><a href="#"> 20+ Like</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_desc">
                                        <h2><a href="blog-details.html">Froome racing to spoil Yates’s pink Giro
                                                dream</a></h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry... </p>
                                    </div>
                                    <div class="read_more_btn">
                                        <a href="blog-details.html">Read More <span><i
                                                    class="zmdi zmdi-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
