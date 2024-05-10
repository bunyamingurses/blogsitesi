@php
    $trends=\App\Models\blog_blog::where("isEnable","=",1)->where("isPopular","=",1)->inRandomOrder()->limit(6)->get();
@endphp

<div class="editor-news-three pt-100 pb-75 mt-4">
    <div class="container">
        <div class="section-title-two mb-40">
            <div class="row align-items-center">
                <div class="col-md-7"><h2>Trend Bloglar</h2></div>
                <div class="col-md-5 text-md-end">
                    <a href="{{ \App\Models\blog_setting::getSiteUrl() }}/bloglar.html" class="link-three" rel=”canonical”>Tüm Bloglar<span><img
                                    src="{{ asset("assets/frontAssets/img/icons/arrow-right.svg") }}" alt="Tüm Bloglar"
                                    title="Tüm Bloglar"></span></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($trends as $trendsWrite)
                <div class="col-xl-4 col-lg-6 col-md-6 col-6">
                    <div class="news-card-thirteen">
                        <div class="news-card-img">
                            <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $trendsWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($trendsWrite->name) }}.html"> <img style="height: 200px; width: 100%;" alt="{{ $trendsWrite->name }}"
                                                                                                                                                                                                         src="{{ asset("imagesWebp/blog/")."/".$trendsWrite->imageWebp }}"></a>
                            <a class="news-cat"
                               href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $trendsWrite->categoryId }}/{{ \App\Http\Controllers\admin\tool\functionController::seo( \App\Models\blog_category::getSingleName($trendsWrite->categoryId)) }}">{{ \App\Models\blog_category::getSingleName($trendsWrite->categoryId) }}</a>
                        </div>
                        <div class="news-card-info">
                            <h3>
                                <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $trendsWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($trendsWrite->name) }}.html">{{ $trendsWrite->name }}</a>
                            </h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i>{{ substr($trendsWrite->created_at,0,11) }}</li>
                                <li><i class="fi fi-rr-eye"></i>{{ $trendsWrite->readCount }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="selected-news-three pb-100">
    <div class="container">
        @php
            $category=\App\Models\blog_category::where("isEnable","=",1)->where("isPopular","=",1)->get();
        @endphp

        @foreach($category as $categoryWrite)

            @php
                $blog=\App\Models\blog_blog::where("isEnable","=",1)->where("isPopular","=",1)->where("categoryId","=",$categoryWrite->id)->inRandomOrder()->limit(4)->get();
            @endphp
            <div class="section-title-two" style="margin-bottom: 20px;">
                <div class="row align-items-center">
                    <div class="col-md-6"><h2>{{ \App\Models\blog_category::getSingleName($categoryWrite->id) }}</h2>
                    </div>
                </div>
            </div>
            <div class="tab-content selected-news-content">
                <div class="tab-pane fade active show">
                    <div class="row justify-content-center">
                        @foreach($blog as $blogWrite)
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-6">
                                <div class="news-card-thirteen">
                                    <div class="news-card-img">
                                        <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($blogWrite->name) }}.html"><img src="https://www.internetamca.com/imagesWebp/blog/small/{{ $blogWrite->imageWebp }}"
                                             style="object-fit: cover;"
                                                                                                                                                                                                                    alt="{{ $blogWrite->name }}"></a>
                                        <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $blogWrite->categoryId }}/{{ \App\Models\blog_category::getSingleNamePermaLink($blogWrite->categoryId) }}.html" class="news-cat">{{ \App\Models\blog_category::getSingleName($blogWrite->categoryId)}}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $blogWrite->id }}/{{$blogWrite->permalink}}.html">{{ $blogWrite->name }}</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ substr($blogWrite->created_at,0,11) }}</a></li>
                                            <li><i class="fi fi-rr-eye"></i><a href="news-by-date.html">{{ $blogWrite->readCount }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $categoryWrite->id }}/{{ $categoryWrite->permaLink }}.html" class="btn-three mt-0 mb-4 d-block w-100">Tüm Blogları Gör<i class="flaticon-arrow-right"></i></a>

        @endforeach
    </div>
</div>


