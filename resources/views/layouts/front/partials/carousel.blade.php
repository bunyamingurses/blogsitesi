
            <!-- Main News Slider Start -->

            @php
                $carousel=\App\Models\blog_blog::where("isEnable","=",1)->where("isCarousel","=",1)->inRandomOrder()->limit(5)->get();
                $number=0;
            @endphp
            <div class=" mt-4">

                <div class="hero-slider-wrap">
                    <div class="hero-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach($carousel as $carouselWrite)

                                <div class="swiper-slide hero-news-card">
                                    <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $carouselWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($carouselWrite->name) }}.html"><img style="width: 100%; max-height: 400px;" src="https://www.internetamca.com/imagesWebp/blog/small/{{$carouselWrite->imageWebp }}" alt="{{ $carouselWrite->name }}" title="{{ $carouselWrite->name }}"></a>
                                    <div class="hero-news-info">
                                        <a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/kategori/{{ $carouselWrite->categoryId }}/{{ \App\Http\Controllers\admin\tool\functionController::seo( \App\Models\blog_category::getSingleName($carouselWrite->categoryId)) }}.html" alt="{{ \App\Models\blog_category::getSingleName($carouselWrite->categoryId) }}" title="{{ \App\Models\blog_category::getSingleName($carouselWrite->categoryId) }}" class="news-cat">{{ \App\Models\blog_category::getSingleName($carouselWrite->categoryId) }}</a>
                                        <h2><a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $carouselWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($carouselWrite->name) }}.html" title="{{ $carouselWrite->name }}" alt="{{ $carouselWrite->name }}">{{ $carouselWrite->name }}</a></h2>

                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ substr($carouselWrite->created_at,0,10) }}</a></li>
                                            <li><i class="fi fi-rr-eye"></i>{{ $carouselWrite->readCount }}</li>
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="hero-prev"><i class="fi-rr-angle-left"></i></div>
                        <div class="hero-next"><i class="fi-rr-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Main News Slider End -->






