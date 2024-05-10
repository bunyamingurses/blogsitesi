<div class="switch-theme-mode">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>


<div class="navbar-area header-three" id="navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}">
                <img class="logo-light" src="{{ asset("assets/frontAssets/img/internetamcaLogoWhite.png") }}" alt="logo">
                <img class="logo-dark" src="{{ asset("assets/frontAssets/img/internetamcaLogoDark.png") }}" alt="logo">
            </a>

            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
               aria-controls="navbarOffcanvas">
                <span class="burger-menu">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
                </span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}" rel=”canonical” class=" nav-link "><span class="fi fi-rr-home"></span> Anasayfa</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/kategoriler.html" rel=”canonical” class=" nav-link "><span class="fi fi-rr-database"></span> Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/bloglar.html" rel=”canonical” class=" nav-link "><span class="fi fi-rr-images"></span> Bloglar</a>
                    </li>

                    <li class="nav-item">
                        <a href="https://ata.msb.gov.tr" rel="nofollow" target="_blank" class=" nav-link "><img src="{{ asset("assets/frontAssets/img/atatürk.png") }}" width="60" height="60" alt=""></a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>


<div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}" class="logo d-inline-block">
            <img class="logo-light" src="{{ asset("assets/frontAssets/img/internetamcaLogoWhite.png") }}" alt="logo">
            <img class="logo-dark" src="{{ asset("assets/frontAssets/img/internetamcaLogoDark.png") }}" alt="logo">
        </a>
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body" style="background-image:url({{ asset("assets/frontAssets/img/atatürk.png") }}); background-size:contain; background-repeat: no-repeat; background-position: center;">
        <div class="accordion" id="navbarAccordion">
            <div class="accordion-item">
                <a class="accordion-link" rel=”canonical” href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}"><span class="fi fi-rr-home"></span> Anasayfa
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-link" rel=”canonical” href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/kategoriler.html"><span class="fi fi-rr-database"></span> Kategoriler
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-link" rel=”canonical” href="{{ \App\Models\blog_setting::getSiteSingle("siteUrl") }}/bloglar.html"><span class="fi fi-rr-images"></span> Bloglar
                </a>
            </div>



        </div>
        <div class="offcanvas-contact-info">
            <h3>İletişim Bilgileri</h3>
            <ul class="contact-info list-style">
                <li>
                    <i class="ri-map-pin-fill"></i>
                    <p>İstanbul/Türkiye</p>
                </li>
                <li>
                    <i class="ri-mail-fill"></i>
                    <a href="mailto:info@internetamca.com" rel=”canonical”><p>info@internetamca.com</p></a>
                </li>
            </ul>

        </div>

    </div>
</div>
