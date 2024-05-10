@extends("layouts.front.index")
@section("metas")
    <title>{{ \App\Models\blog_setting::getSiteSingle("title") }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\blog_setting::getSiteSingle("description") }}"/>
    <meta http-equiv="cache-control" content="public"/>
    <meta name="copyright" content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}"/>
    <meta name="author" content="{{ \App\Models\blog_setting::getSiteSingle("author") }}"/>
    <meta name="publisher" content="www.internetamca.com Türkiyenin Dijital Adresi"/>
    <meta name="distribution" content="Global"/>
    <meta name="robots" content="INDEX,FOLLOW"/>


    <meta property="og:type" content="website"/>
    <meta property="og:url"
          content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}"/>
    <meta property="og:image" content="https://www.internetamca.com/assets/frontAssets/img/internetamcaLogoWhite.png"/>
    <meta property="og:site_name" content="{{ \App\Models\blog_setting::getSiteSingle("title") }}"/>
    <meta property="og:description" content="{{ \App\Models\blog_setting::getSiteSingle("description") }}"/>
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:title" content="{{ \App\Models\blog_setting::getSiteSingle("title") }}"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}">
    <meta property="twitter:title" content="{{ \App\Models\blog_setting::getSiteSingle("title") }}">
    <meta property="twitter:description" content="{{ \App\Models\blog_setting::getSiteSingle("title") }}">
    <meta property="twitter:image"
          content="https://www.internetamca.com/assets/frontAssets/img/internetamcaLogoWhite.png">

@endsection


@section("content")

    @include("layouts.front.partials.carousel")
    @include("layouts.front.partials.content")

@endsection
