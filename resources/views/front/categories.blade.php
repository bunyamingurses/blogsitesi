@extends("layouts.front.index")

@section("metas")
    <title>{{ \App\Models\blog_setting::getSiteSingle("title") }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\blog_setting::getSiteSingle("description") }}" />
    <meta name="keywords" content="{{ \App\Models\blog_setting::getSiteSingle("keyword") }}" />
    <meta http-equiv="cache-control" content="public" />
    <meta name="copyright" content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}" />
    <meta name="author" content="{{ \App\Models\blog_setting::getSiteSingle("author") }}" />
    <meta name="publisher" content="www.internetamca.com Türkiyenin Dijital Adresi" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="INDEX,FOLLOW" />





    <meta property="og:type" content="website" />
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
    <meta property="twitter:image" content="https://www.internetamca.com/assets/frontAssets/img/internetamcaLogoWhite.png">






@endsection


@section("content")
    @include("layouts.front.partials.banner")

    <div class="popular-news-three ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8">
                    <div class="section-title-two mb-40">
                        <h2>Kategoriler</h2>
                    </div>
                    <div class="popular-news-wrap">
                        @foreach($categories as $categoriesWrite)
                            <div class="news-card-three">
                                <div class="news-card-info">
                                    <h2><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $categoriesWrite->id }}/{{  $categoriesWrite->permaLink }}.html">{{ $categoriesWrite->name }}</a></h2>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $categoriesWrite->id }}/{{  $categoriesWrite->permaLink }}.html">{{ substr($categoriesWrite->created_at,0,11) }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>


                    {{ $categories->onEachSide(0)->links() }}

                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        @include("layouts.front.partials.trendBlogs")
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Etiketler</h3>
                            <ul class="tag-list list-style">

                                @php
                                    $etiket=\App\Models\blog_category::where("isEnable","=",1)->where("isPopular","=",1)->get();
                                @endphp
                                @foreach ($etiket as $etiketYaz)
                                    <li><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $etiketYaz->id }}/{{  $etiketYaz->permaLink }}.html" target="_blank" class="btn btn-sm btn-outline-secondary m-1">{{ $etiketYaz->name }}</a></li>

                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
