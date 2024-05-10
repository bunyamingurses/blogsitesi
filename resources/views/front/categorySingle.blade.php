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
@endsection

@section("content")

    <div class="breadcrumb-wrap bg-dark">
        <div class="container">
                <h2 class="breadcrumb-title text-light">{{ $category[0]["name"] }}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li>Anasayfa</li>
                    <li>Kategoriler</li>
                </ul>

        </div>
    </div>

    <div class="popular-news-three ptb-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8">
                    <div class="section-title-two mb-40">
                        <h2>Bloglar</h2>
                    </div>
                    <div class="popular-news-wrap">
                        @foreach($blogs as $blogWrite)
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <a href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($blogWrite->name) }}.html"> <img src="{{ asset("imagesWebp/blog/small/")."/".$blogWrite->imageWebp }}" alt="Image"></a>
                                </div>
                                <div class="news-card-info">
                                    <h2><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($blogWrite->name) }}.html">{{ $blogWrite->name }}</a></h2>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($blogWrite->name) }}.html">{{ substr($blogWrite->created_at,0,11) }}</a>
                                        </li>
                                        <li><i class="fi fi-rr-database"></i><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $blogWrite->categoryId }}/{{ \App\Http\Controllers\admin\tool\functionController::seo( \App\Models\blog_category::getSingleName($blogWrite->categoryId)) }}">{{ \App\Models\blog_category::getSingleName($blogWrite->categoryId)."..." }}</li>
                                        <li><i class="fi fi-rr-eye"></i><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($blogWrite->name) }}.html">{{ $blogWrite->readCount }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>


                    {{ $blogs->onEachSide(0)->links() }}

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
