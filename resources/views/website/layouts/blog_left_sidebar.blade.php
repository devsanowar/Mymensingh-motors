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
                    <a href="{{ route('blog_single.page', $recentPost->post_slug) }}"><img
                            src="{{ asset($recentPost->image) }}" alt=""></a>
                </div>
                <div class="post_content">
                    <h3><a
                            href="{{ route('blog_single.page', $recentPost->post_slug) }}">{{ $recentPost->post_title }}</a>
                    </h3>
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
                @forelse ($postCategories as $category)
                    <li>
                        <a href="javascript:void(0);" class="load-posts" data-id="{{ $category->id }}">
                            {{ $category->category_name }}
                            <span class="cat_count">({{ $category->posts_count }})</span>
                        </a>
                    </li>
                @empty
                    <li>Category not found.</li>
                @endforelse

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


@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $('.load-posts').click(function() {
            var catId = $(this).data('id');

            $.ajax({
                url: '/get-category-posts/' + catId,
                type: 'GET',
                success: function(data) {
                    console.log(data);

                    var html = '';
                    if (data.posts.length > 0) {
                        data.posts.forEach(function(post) {
                            html += '<div class="col-lg-6 col-md-6 col-12">';
                            html += '<div class="single_blog_post mb-40">';
                            html += '<div class="post_thumbnail">';
                            html += '<a href="/blog/' + post.post_slug + '"><img src="/' + post
                                .image + '" alt=""></a>';
                            html += '</div>';
                            html += '<div class="post_content_meta">';
                            html += '<div class="post_meta"><ul>';
                            html += '<li>Posted ' + new Date(post.created_at).toLocaleString(
                                "default", {
                                    month: "long",
                                    day: "numeric"
                                }) + '.</li>';
                            html += '<li>';
                            if (post.views >= 1000) {
                                html += Math.floor(post.views / 1000) + 'k+ views';
                            } else {
                                html += post.views + ' views';
                            }
                            html += '</li>';
                            html += '<li>';
                            if (post.likes_count >= 1000) {
                                html += (post.likes_count / 1000).toFixed(1) + 'k+ Like';
                            } else {
                                html += post.likes_count + ' Like';
                            }
                            html += '</li>';
                            html += '</ul></div>';
                            html += '<div class="blog_post_desc">';
                            html += '<h2><a href="/blog/' + post.post_slug + '">' + post
                                .post_title + '</a></h2>';
                            var excerpt = post.post_content ? post.post_content.substring(0,
                                50) + "..." : '';
                            html += '<p>' + excerpt + '</p>';
                            html += '</div>';
                            html += '<div class="read_more_btn">';
                            html += '<a href="/blog/' + post.post_slug +
                                '">Read More <span><i class="zmdi zmdi-arrow-right"></i></span></a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                    } else {
                        html += '<p>Blog post not found....</p>';
                    }

                    $('#category-posts').html(html);
                }
            });
        });
    </script>
@endpush
