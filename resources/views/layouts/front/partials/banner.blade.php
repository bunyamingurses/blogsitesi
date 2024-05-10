<div class="breadcrumb-wrap bg-dark">
    <div class="container">
        @if(request()->route()->getName()=="categories")
            <h2 class="breadcrumb-title text-light">Kategoriler</h2>
            <ul class="breadcrumb-menu list-style">
                <li>Anasayfa</li>
                <li>Kategoriler</li>
            </ul>

        @elseif(request()->route()->getName()=="blog")
            <h2 class="breadcrumb-title text-light">Bloglar</h2>
            <ul class="breadcrumb-menu list-style">
                <li>Anasayfa</li>
                <li>Bloglar</li>
            </ul>
        @endif

    </div>
</div>


