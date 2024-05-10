<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Trend Bloglar</h3>
    <div class="pp-post-wrap-three">
        @php
            $trends=\App\Models\blog_blog::where("isEnable","=",1)->where("isPopular","=",1)->inRandomOrder()->limit(5)->get();
        @endphp

        @foreach($trends as $trendsWrite)
        <div class="news-card-one">
            <div class="news-card-img">
                <img style="height: 100%;" src="{{ asset("imagesWebp/blog/")."/".$trendsWrite->imageWebp }}" alt="Image">
            </div>
            <div class="news-card-info">
                <h3><a rel=”canonical” href="{{ \App\Models\blog_setting::getSiteUrl() }}/blog/{{ $trendsWrite->id }}/{{ \App\Http\Controllers\admin\tool\functionController::seo($trendsWrite->name) }}.html">{{ substr($trendsWrite->name,0,30) }}...</a></h3>
                <ul class="news-metainfo list-style">
                    <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ substr($trendsWrite->created_at,0,11) }}</a></li>
                </ul>
            </div>
        </div>
        @endforeach

    </div>
</div>


