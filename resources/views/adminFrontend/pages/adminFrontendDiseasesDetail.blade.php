@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    {{ $diseases->title }}
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

    {{--@dd($diseases)--}}


    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>{{ $diseases->title }}</h2>
                        <h3 style="color: white">{{ $diseases->category->name }}</h3>
                        @foreach($diseases->cities as $item)
                            <span class="badge badge-secondary"><a href="{{route('admin.frontend.city.detail',[$item->slug])}}">{{$item->name}}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">

            <div id="offer-mobile" class="offer-container blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                    <form class="form" action="{{ route('admin.frontend.offer') }}" method="POST"
                          id="offerForm">
                        @csrf

                        <input type="hidden" name="category_id" value="{{ $diseases->diseases_category_id }}">
                        <input type="hidden" name="diseases_id" value="{{ $diseases->id }}">

                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Get an offer
                        </button>
                    </form>
                </aside>
            </div>

            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            @if($diseases->image)
                                <img class="img-fluid" src="data:image/jpeg;base64,{{ $diseases->image }}"
                                     alt="{{ $diseases->name }}">
                            @else
                                <img class="img-fluid"
                                     src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                     alt="{{ $diseases->name }}">
                            @endif
                        </div>

                        <div class="blog_details">
                            <h2>{{ $diseases->title }}
                            </h2>

                            <p class="excert">
                                {!! $diseases->content !!}
                            </p>


                        </div>
                    </div>
                    <div class="navigation-top">

                        <div class="navigation-area">
                            <div class="row">

                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    @if(isset($prevDiseases))

                                        <div class="thumb">
                                            <a href="{{ route('admin.frontend.diseases.detail',[$prevDiseases->slug]) }}">
                                                @if($prevDiseases->image)
                                                    <img style="max-width: 100px!important;" class="img-fluid"
                                                         src="data:image/jpeg;base64,{{ $prevDiseases->image }}"
                                                         alt="{{ $prevDiseases->name }}">

                                                @else
                                                    <img style="max-width: 100px!important;" class="img-fluid"
                                                         src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                                         alt="{{ $prevDiseases->name }}">
                                                @endif

                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Treatment</p>
                                            <a href="{{ route('admin.frontend.diseases.detail',[$prevDiseases->slug]) }}">
                                                <h4>{{ $prevDiseases->title }}</h4>
                                            </a>
                                        </div>
                                    @endif
                                </div>


                                @if(isset($nextDiseases))
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Treatment</p>
                                            <a href="{{ route('admin.frontend.diseases.detail',[$nextDiseases->slug]) }}">
                                                <h4>{{ $nextDiseases->title }}</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('admin.frontend.diseases.detail',[$nextDiseases->slug]) }}">
                                                @if($nextDiseases->image)
                                                    <img style="max-width: 100px!important;" class="img-fluid"
                                                         src="data:image/jpeg;base64,{{ $nextDiseases->image }}"
                                                         alt="{{ $nextDiseases->name }}">

                                                @else
                                                    <img style="max-width: 100px!important;" class="img-fluid"
                                                         src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                                         alt="{{ $nextDiseases->name }}">

                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>


                    {{--                        TODO: yorum yeri --}}
                    {{--                        <div class="comments-area">--}}
                    {{--                            <h4>05 Comments</h4>--}}
                    {{--                            <div class="comment-list">--}}
                    {{--                                <div class="single-comment justify-content-between d-flex">--}}
                    {{--                                    <div class="user justify-content-between d-flex">--}}
                    {{--                                        <div class="thumb">--}}
                    {{--                                            <img src="assets/img/comment/comment_1.png" alt="">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="desc">--}}
                    {{--                                            <p class="comment">--}}
                    {{--                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
                    {{--                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
                    {{--                                            </p>--}}
                    {{--                                            <div class="d-flex justify-content-between">--}}
                    {{--                                                <div class="d-flex align-items-center">--}}
                    {{--                                                    <h5>--}}
                    {{--                                                        <a href="#">Emilly Blunt</a>--}}
                    {{--                                                    </h5>--}}
                    {{--                                                    <p class="date">December 4, 2017 at 3:12 pm </p>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="reply-btn">--}}
                    {{--                                                    <a href="#" class="btn-reply text-uppercase">reply</a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="comment-list">--}}
                    {{--                                <div class="single-comment justify-content-between d-flex">--}}
                    {{--                                    <div class="user justify-content-between d-flex">--}}
                    {{--                                        <div class="thumb">--}}
                    {{--                                            <img src="assets/img/comment/comment_2.png" alt="">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="desc">--}}
                    {{--                                            <p class="comment">--}}
                    {{--                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
                    {{--                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
                    {{--                                            </p>--}}
                    {{--                                            <div class="d-flex justify-content-between">--}}
                    {{--                                                <div class="d-flex align-items-center">--}}
                    {{--                                                    <h5>--}}
                    {{--                                                        <a href="#">Emilly Blunt</a>--}}
                    {{--                                                    </h5>--}}
                    {{--                                                    <p class="date">December 4, 2017 at 3:12 pm </p>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="reply-btn">--}}
                    {{--                                                    <a href="#" class="btn-reply text-uppercase">reply</a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="comment-list">--}}
                    {{--                                <div class="single-comment justify-content-between d-flex">--}}
                    {{--                                    <div class="user justify-content-between d-flex">--}}
                    {{--                                        <div class="thumb">--}}
                    {{--                                            <img src="assets/img/comment/comment_3.png" alt="">--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="desc">--}}
                    {{--                                            <p class="comment">--}}
                    {{--                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
                    {{--                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
                    {{--                                            </p>--}}
                    {{--                                            <div class="d-flex justify-content-between">--}}
                    {{--                                                <div class="d-flex align-items-center">--}}
                    {{--                                                    <h5>--}}
                    {{--                                                        <a href="#">Emilly Blunt</a>--}}
                    {{--                                                    </h5>--}}
                    {{--                                                    <p class="date">December 4, 2017 at 3:12 pm </p>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="reply-btn">--}}
                    {{--                                                    <a href="#" class="btn-reply text-uppercase">reply</a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}




                    {{--                       TODO: Yorum yapma formu olarak kullnaılabilir.--}}
                    {{--                        <div class="comment-form">--}}
                    {{--                            <h4>Leave a Reply</h4>--}}
                    {{--                            <form class="form-contact comment_form" action="#" id="commentForm">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                 <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"--}}
                    {{--                                           placeholder="Write Comment"></textarea>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-sm-6">--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-sm-6">--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-12">--}}
                    {{--                                        <div class="form-group">--}}
                    {{--                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="form-group">--}}
                    {{--                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>--}}
                    {{--                                </div>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                </div>


                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside id="offer-masaustu" class="single_sidebar_widget search_widget">
                            <form class="form" action="{{ route('admin.frontend.offer') }}" method="POST"
                                  id="offerForm">
                                @csrf

                                <input type="hidden" name="category_id" value="{{ $diseases->diseases_category_id }}">
                                <input type="hidden" name="diseases_id" value="{{ $diseases->id }}">

                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Get an offer
                                </button>
                            </form>
                        </aside>
                        <aside
                            class="single_sidebar_widget post_category_widget single_sidebar_widget popular_post_widget">
                            <h4 class="widget_title">Cities</h4>
                            {{--                                <ul class="list cat-list">--}}
                            @if(count($diseases->cities) == 0)
                                <li>
                                    <a class="d-flex">
                                        <p>No treatments have been added in this city yet</p>
                                    </a>
                                </li>
                            @endif

                            {{--                                    @foreach($diseases->cities as $item)--}}
                            {{--                                    <li>--}}
                            {{--                                        <a href="{{ route('admin.frontend.city.detail', [$item->slug]) }}" class="d-flex">--}}
                            {{--                                            <p>{{ $item->name }}</p>--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                    @endforeach--}}




                            @foreach($diseases->cities as $item)
                                <div class="media post_item">
                                    @if($item->image)
                                        <img style="max-width: 80px!important;"
                                             src="data:image/jpeg;base64,{{ $item->image }}" alt="{{ $item->name }}">
                                    @else
                                        <img style="max-width: 80px!important;"
                                             src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                             alt="">
                                    @endif

                                    <div class="media-body">
                                        <a href="{{ route('admin.frontend.city.detail',[$item->slug]) }}">
                                            <p> {{ $item->name }}</p>
                                        </a>
                                        {{--                                        <p>January 12, 2019</p>--}}
                                    </div>
                                </div>
                            @endforeach

                            {{--                                </ul>--}}
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recently added treatments</h3>

                            @foreach($recentDiseases as $item)
                                <div class="media post_item">
                                    @if($item->image)
                                        <img style="max-width: 80px!important;"
                                             src="data:image/jpeg;base64,{{ $item->image }}" alt="{{ $item->name }}">

                                    @else
                                        <img style="max-width: 80px!important;"
                                             src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                             alt="{{ $item->name }}">
                                    @endif

                                    <div class="media-body">
                                        <a href="{{ route('admin.frontend.diseases.detail',[$item->slug]) }}">
                                            <h3>{{ $item->title }}</h3>
                                        </a>
                                        {{--                                        <p>January 12, 2019</p>--}}
                                    </div>
                                </div>
                            @endforeach

                        </aside>
                        {{--                            <aside class="single_sidebar_widget tag_cloud_widget">--}}
                        {{--                                <h4 class="widget_title">District</h4>--}}
                        {{--                                <ul class="list">--}}
                        {{--                                    @foreach(json_decode($city->districts) as $district)--}}
                        {{--                                    <li>--}}
                        {{--                                        <a>{{ $district }}</a>--}}
                        {{--                                    </li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </ul>--}}
                        {{--                            </aside>--}}


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->

@endsection

@section('js')
@endsection
