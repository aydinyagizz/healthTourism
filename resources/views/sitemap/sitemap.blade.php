<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>


    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/cities') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($cities as $city)
    <url>
        <loc>{{ url('/').'/citiesDetail/'.$city->slug }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach


    <url>
        <loc>{{ url('/treatment') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($treatments as $treatment)
        <url>
            <loc>{{ url('/').'/treatmentDetail/'.$treatment->slug }}</loc>
            <lastmod>{{ $now }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <url>
        <loc>{{ url('/offer') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>


    <url>
        <loc>{{ url('/privacyPolicy') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>


    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($blogs as $blog)
    <url>
        <loc>{{ url('/').'/blog-detail/'.$blog->slug }}</loc>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach


    @foreach($categories as $category)
        <url>
            <loc>{{ url('/').'/category/'.$category->slug }}</loc>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach


    <url>
        <loc>{{ url('/sitemap') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>


</urlset>

