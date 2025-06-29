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
        @forelse ($recentPosts as $recentPost)
            <div class="single_recent_post">
                <div class="recent_post_img">
                    <a href="{{ route('blog_single.page', $recentPost->post_slug) }}"><img src="{{ asset($recentPost->image) }}"
                            alt=""></a>
                </div>
                <div class="post_content">
                    <h3><a href="{{ route('blog_single.page', $recentPost->post_slug) }}">{{ $recentPost->post_title }}</a></h3>
                    <span class="post_publist_date">{{ $recentPost->created_at->format('F j, Y') }}</span>
                </div>
            </div>
        @empty
            <p>Blog post not found..</p>
        @endforelse


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
