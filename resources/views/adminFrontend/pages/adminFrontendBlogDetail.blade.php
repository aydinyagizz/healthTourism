@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    {{ $blog_detail->title }}
@endsection

@section('css')
@endsection


@section('content')

    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>{{ $blog_detail->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area" style="margin-top: 100px!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
{{--                        <div class="section-tittle text-left mb-80">--}}
{{--                            <h2>{{ $blog_detail->title }}</h2>--}}
{{--                        </div>--}}
                        <div class="feature-img">
                            @if($blog_detail->image)
                                <img style="border-radius: 5px" class="img-fluid" src="data:image/jpeg;base64,{{ $blog_detail->image }}">
                            @endif
                        </div>

                        <div class="blog_details">

                            @php($category_name = \App\Models\AdminBlogCategory::where('id', $blog_detail->category_id)->first())

                            <p>{{ $blog_detail->created_at->format('M d Y') }}</p>

                            <ul class="blog-info-link mt-3 mb-4">
                                <a href="{{ route('admin.frontend.category.blog', $category_name->slug) }}"><span
                                        class="badge badge-pill badge-primary">{{ $category_name->name }}</span></a>
                            </ul>

                            {!! $blog_detail->content !!}

                        </div>
                    </div>
                    <div class="navigation-top">

                    </div>


                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach($category as $category)
                                    <li>
                                        <a href="{{ route('admin.frontend.category.blog', $category->slug) }}" class="d-flex">
                                            <p>{{ $category->name }}</p>
                                            {{--                                        <p>(37)</p>--}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">

                            <h3 class="widget_title">Recent Post</h3>
                            @foreach($recent_blog as $recent_blog)
                                <div class="media post_item">
                                    @if($recent_blog->image)
                                        <img  style="max-width: 90px; max-height: 90px; border-radius: 5px" src="data:image/jpeg;base64,{{ $recent_blog->image }}">
                                    @endif
                                    <div style="max-width: 90px">

                                    </div>

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
@endsection

@section('js')
@endsection
