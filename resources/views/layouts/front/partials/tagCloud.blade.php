<div class="sidebar-widget">
    <h3 class="sidebar-widget-title">Tüm Kategoriler</h3>
    @php
        $category=\App\Models\blog_category::where("isEnable","=",1)->get();
    @endphp

    <ul class="cloud bg-light p-3 w-100" style="border-radius: 10px; font-family: Verdana;" role="navigation"
        aria-label="Kategori etiket havuzu">
        @foreach($category as $categoryWrite)
            <li><a data-weight="{{ rand(2,5) }}" class="sektorlink" href="kategori/{{ $categoryWrite->id }}/{{ $categoryWrite->permaLink }}" alt="{{ $categoryWrite->name }}">{{ $categoryWrite->name }}</a></li>
        @endforeach


    </ul>
</div>



