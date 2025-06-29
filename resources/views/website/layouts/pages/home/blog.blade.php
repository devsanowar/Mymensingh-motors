 <div class="latest_post pb-70">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section_title">
                     <h2>Latest News</h2>
                 </div>
             </div>
         </div>
         <div class="row mt-60">
             @forelse ($blogs as $blog)
                 <div class="col-lg-4 col-md-6">
                     <div class="single_blog_post mb-40">
                         <div class="post_thumbnail">
                             <a href="{{ route('blog_single.page', $blog->post_slug) }}"><img
                                     src="{{ asset($blog->image) }}" alt=""></a>
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
                                 <h2><a
                                         href="{{ route('blog_single.page', $blog->post_slug) }}">{{ $blog->post_title }}</a>
                                 </h2>
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
                 <p class="text-center">Post not found!</p>
             @endforelse


         </div>
     </div>

 </div>
