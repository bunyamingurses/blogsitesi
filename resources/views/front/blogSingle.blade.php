@extends("layouts.front.index")
@section("metas")
    <title>{{ \App\Models\blog_setting::getSiteSingle("title") }} - {{ $blog[0]["name"] }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\blog_setting::getSiteSingle("description") }}"/>
    <meta http-equiv="cache-control" content="public"/>
    <meta name="copyright" content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}"/>
    <meta name="author" content="{{ \App\Models\blog_setting::getSiteSingle("author") }}"/>
    <meta name="publisher" content="www.internetamca.com Türkiyenin Dijital Adresi"/>
    <meta name="distribution" content="Global"/>
    <meta name="robots" content="INDEX,FOLLOW"/>

    <meta property="og:url"
          content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/blog/{{ $blog[0]["id"] }}/{{ $blog[0]["permalink"] }}"/>
    <meta property="og:image"
          content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/imagesWebp/blog/{{ $blog[0]["imageWebp"] }} "/>
    <meta property="og:site_name"
          content="{{ \App\Models\blog_setting::getSiteSingle("title") }} - {{ $blog[0]["name"] }}"/>
    <meta property="og:description" content="{{ \App\Models\blog_setting::getSiteSingle("description") }}"/>
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:title" content="{{ $blog[0]["name"] }}"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url"
          content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/blog/{{ $blog[0]["id"] }}/{{ $blog[0]["permalink"] }}">
    <meta property="twitter:title" content="{{ $blog[0]["name"] }}">
    <meta property="twitter:description" content="{{ $blog[0]["name"] }}">
    <meta property="twitter:image"
          content="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/imagesWebp/blog/{{ $blog[0]["imageWebp"] }}">
@endsection




@section("content")

    <div class="breadcrumb-wrap bg-dark">
        <div class="container">
            <h2 class="breadcrumb-title text-light">{{ $blog[0]["name"] }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li>Bloglar</li>
                <li>Blog Detay</li>
            </ul>

        </div>
    </div>



    @if(session("status"))
        <div class="alert alert-info container text-center text-lg-center"> {{ session("status") }}</div>
    @endif


    <div class="news-details-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <article>
                        <div class="news-img">
                            <img src="{{ asset("imagesWebp/blog/")."/".$blog[0]["imageWebp"] }}" alt="{{ $blog[0]["name"] }}" title="{{ $blog[0]["name"] }}">
                            <a href="https://internetamca.com/kategori/{{ $blog[0]["categoryId"] }}/{{ \App\Http\Controllers\admin\tool\functionController::seo( \App\Models\blog_category::getSingleName($blog[0]["categoryId"])) }}.html" class="news-cat">{{ \App\Models\blog_category::getSingleName($blog[0]["categoryId"]) }}</a>
                        </div>
                        <h1>{{ $blog[0]["name"] }}</h1>
                        <ul class="news-metainfo list-style">
                            <li>
                                <a href="https://internetamca.com/kategori/{{ $blog[0]["categoryId"] }}/{{ \App\Http\Controllers\admin\tool\functionController::seo( \App\Models\blog_category::getSingleName($blog[0]["categoryId"])) }}.html" class="news-cat"><i class="fi-rr-database"></i>{{ \App\Models\blog_category::getSingleName($blog[0]["categoryId"]) }}</a>
                            </li>
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ substr($blog[0]["created_at"],0,11) }}</a></li>
                            <li><i class="fi fi-rr-eye"></i>{{ $blog[0]["readCount"] }}</li>
                        </ul>
                        <div class="news-para">
                            @foreach($details as $detailsWrite)
                                @if($detailsWrite->imageWebp)
                                    <img class="img-fluid  mr-4 mb-2"
                                         src="{{ asset("imagesWebp/blog/detail/")."/".$detailsWrite->imageWebp }} "
                                         alt="{{ $blog[0]["name"] }}">
                                @endif
                                <p>{!! htmlspecialchars_decode($detailsWrite->text) !!}</p>

                            @endforeach
                        </div>
                    </article>
                    <hr>
                    @php
                        $comments=\App\Models\blog_comment::where("blog_id","=",$blog[0]["id"])->where("enable","=",1)->get();
                    @endphp

                    @if(isset($comments[0]["name"])!=null)
                    <h3 class="comment-box-title"><i class="fi-rr-comment"></i> Yorumlar</h3>
                    <div class="comment-item-wrap">

                        @foreach($comments as $commentsWrite)
                        <div class="comment-item">
                            <div class="comment-author-img">
                                <i class="fi-rr-user" style="font-size: 80px;"></i>
                            </div>
                            <div class="comment-author-wrap">
                                <div class="comment-author-info">
                                    <div class="row align-items-start">
                                        <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                            <div class="comment-author-name">
                                                <h5>{{ $commentsWrite->name }}</h5>
                                                <span class="comment-date">{{ substr($commentsWrite->created_at,0,11) }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                            <div class="comment-text">
                                                <p>{{ $commentsWrite->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <hr>
                    @endif


                    <div id="cmt-form">
                        <div class="mb-30">
                            <h3 class="comment-box-title"><i class="fi-rr-comment-pen"></i> Yorum Yap</h3>
                            <p>Blog için yorumlarınızı buradan belirtebilirsiniz.</p>
                        </div>
                        <form action="{{ route("blogCommentCreate",["id"=>$blog[0]["id"]]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" required placeholder="Ad Soyad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" required placeholder="E-Posta Adresi">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <textarea name="comment" id="comment" cols="30" rows="10"
                                              placeholder="Lütfen yorumunuzu belirtin."></textarea>
                                    </div>
                                </div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                                @if(session("status"))
                                    {{ session("status") }}
                                @endif

                                <div class="col-md-12 mt-3">
                                    <button class="btn-two">Yorumu İlet <i class="flaticon-right-arrow"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        @include("layouts.front.partials.trendBlogs")
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Etiketler</h3>
                            <ul class="tag-list list-style">
                                @php
                                    $etiket=explode(",",$blog[0]["tags"]);
                                @endphp

                                @foreach ($etiket as $etiketYaz)
                                   <li> <a href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/blog/{{ $blog[0]["id"] }}/{{ $blog[0]["permalink"] }}.html"
                                       target="_blank" class="btn btn-sm btn-outline-secondary m-1">{{ $etiketYaz }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
