@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    {{ $category_get->name }}
@endsection

@section('css')
    <style>
        /* Mobil cihazlar için konumu ayarla */


        @media only screen and (max-width: 600px) {
            #offer-masaustu {
                display: none;
            }
        }


        @media (min-width: 641px) {

            #offer-mobile {
                display: none;
            }

            /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
        }

        @media (min-width: 961px) {

            #offer-mobile {
                display: none;
            }

            /* tablet, landscape iPad, lo-res laptops ands desktops */
        }

        @media (min-width: 1025px) {
            #offer-mobile {
                display: none;
            }

            /* big landscape tablets, laptops, and desktops */
        }

        @media (min-width: 1281px) {

            #offer-mobile {
                display: none;
            }

            /* hi-res laptops and desktops */
        }

    </style>
@endsection

@section('content')

    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2> {{ $category_get->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">


            <div id="offer-mobile" class="offer-container blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">

                    <form class="form" action="{{ route('admin.frontend.offer') }}" method="POST"
                          id="offerForm">
                        @csrf
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Get an offer
                        </button>
                    </form>
                </aside>
            </div>


            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        @if(count($blog) < 1)
                            <div class="alert alert-warning" role="alert">
                                No Blogs Found For This Category
                            </div>
                        @endif


                        <div class="row">
                        @foreach($blog as $item)
                            <article class="blog_item col-md-6">
                                <div class="blog_item_img">

                                    @if($item->image)
                                        <a href="{{ route('admin.frontend.blog.detail', $item->slug) }}">
                                        <img class="card-img " src="data:image/jpeg;base64,{{ $item->image }}"
                                             alt="{{ $item->name }}">
                                        </a>
                                    @else
                                        {{--                                        <img class="card-img rounded-0" src="{{ asset('public/adminFrontend/assets/img/gallery/location1.png') }}" alt="{{ $item->name }}">--}}

                                    @endif


                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $item->created_at->day }}</h3>
                                        @php($month = date('M', strtotime($item->created_at)))
                                        <p>{{ $month }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                  <p>
                                    <ul class="blog-info-link mt-4">
                                        <a href="{{ route('admin.frontend.category.blog', $item->category_slug) }}">
                                            <span class="badge badge-pill badge-info">{{ $item->category_name }}</span>
                                        </a>
                                    </ul>
                                    </p>

                                    <a class="d-inline-block" href="{{ route('admin.frontend.blog.detail', $item->slug) }}">
                                        <h2>{{ $item->title }}</h2>
                                    </a>
                                    <p>{!! mb_strimwidth($item->content, 0, 200, '...') !!}</p>
                                    <ul class="blog-success-link mt-4">
                                        <a href="{{ route('admin.frontend.blog.detail', [$item->slug]) }}"><span
                                                class="badge badge-pill badge-primary">Read more -></span></a>
                                    </ul>

                                </div>
                            </article>
                        @endforeach
                        </div>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    {{ $blog->links() }}
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside id="offer-masaustu" class="single_sidebar_widget search_widget">
                            <form class="form" action="{{ route('admin.frontend.offer') }}" method="POST"
                                  id="offerForm">
                                @csrf

                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Get an offer
                                </button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach($category as $item)
                                    <li>
                                        <a href="{{ route('admin.frontend.category.blog', $item->slug) }}" class="d-flex">
                                            <p>{{ $item->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>

                            @if(count($recent_blog) < 1)
                                <div class="alert alert-warning" role="alert">
                                    Recent Post Not Found
                                </div>
                            @endif

                            @foreach($recent_blog as $recent_blog)
                            <div class="media post_item">
                                @if($recent_blog->image)
                                    <a href="{{ route('admin.frontend.blog.detail', [$recent_blog->slug]) }}">  <img style="border-radius: 5px" width="100px" src="data:image/jpeg;base64,{{ $recent_blog->image }}"
                                                                                                                     alt="{{ $recent_blog->name }}"></a>
                                @else
                                @endif

                                <div class="media-body">
                                    <a href="{{ route('admin.frontend.blog.detail', [$recent_blog->slug]) }}">
                                        <h3>{!! $recent_blog->title !!}</h3>
                                    </a>
                                    <p>{{ $recent_blog->created_at->format('M d Y') }}</p>
                                </div>
                            </div>
                            @endforeach

                        </aside>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection

@section('js')
@endsection
