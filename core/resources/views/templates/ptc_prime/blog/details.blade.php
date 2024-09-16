@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="blog-detials py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details">
                        <div class="blog-details__thumb">
                            <img class="fit-image" src="{{ frontendImage('blog', @$blog->data_values->image, '870x600') }}" alt="blog_image">
                        </div>
                        <div class="blog-details__content">
                            <span class="blog-item__date mb-2"><span class="blog-item__date-icon"><i class="las la-clock"></i></span>
                                {{ showDateTime($blog->created_at, 'd M Y') }} </span>
                            <h3 class="blog-details__title">{{ __($blog->data_values->title) }} </h3>
                            <div class="blog-details__desc">
                                @php echo $blog->data_values->description @endphp
                            </div>
                            <div class="blog-details__share d-flex align-items-center mt-4 flex-wrap">
                                <h5 class="social-share__title me-sm-3 d-inline-block mb-0 me-1"> @lang('Share This') </h5>
                                <ul class="social-list">
                                    <li class="social-list__item"><a class="social-list__link flex-center"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item"><a class="social-list__link flex-center"
                                            href="https://twitter.com/intent/tweet?text={{ @$blog->data_values->title }}&amp;url={{ urlencode(url()->current()) }}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item"><a class="social-list__link flex-center"
                                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ @$blog->data_values->title }}&amp;summary={{ strLimit(strip_tags($blog->data_values->description), 100) }}">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="social-list__item"><a class="social-list__link flex-center"
                                            href="https://plus.google.com/share?url={{ urlencode(url()->current()) }}">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="blog-sidebar-wrapper">
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title"> @lang('Latest Blog') </h5>
                            @foreach ($latests as $latestBlog)
                                <div class="latest-blog">
                                    <div class="latest-blog__thumb">
                                        <a href="{{ route('blog.details', $latestBlog->slug) }}"> <img class="fit-image"
                                                src="{{ frontendImage('blog', 'thumb_' . @$latestBlog->data_values->image, '435x300') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="latest-blog__content">
                                        <h6 class="latest-blog__title"><a
                                                href="{{ route('blog.details', $latestBlog->slug) }}">{{ __($latestBlog->data_values->title) }}</a></h6>
                                        <span class="latest-blog__date fs-13"> {{ showDateTime($latestBlog->created_at, 'd M Y') }} </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title"> @lang('Popular Blog') </h5>
                            @foreach ($popular as $popularBlog)
                                <div class="latest-blog">
                                    <div class="latest-blog__thumb">
                                        <a href="{{ route('blog.details', $popularBlog->slug) }}">
                                            <img class="fit-image"
                                                src="{{ frontendImage('blog', 'thumb_' . @$popularBlog->data_values->image, '435x300') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="latest-blog__content">
                                        <h6 class="latest-blog__title"><a
                                                href="{{ route('blog.details', $popularBlog->slug) }}">{{ __($popularBlog->data_values->title) }}</a>
                                        </h6>
                                        <span class="latest-blog__date fs-13"> {{ showDateTime($popularBlog->created_at, 'd M Y') }} </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
