<!DOCTYPE html>
<html lang="tr">
<head>
    <link rel="icon" type="image/x-icon" href="https://www.internetamca.com/{{ asset("assets/siteIcon.png") }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">

    @yield("metas")
     
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2629874051071785" crossorigin="anonymous"></script>
    
    <meta name="google-adsense-account" content="ca-pub-2629874051071785">
    
    <!-- Favicon -->
    <link href="{{ asset("assets/siteIcon.png") }}" rel="icon">


    <meta name="google-adsense-account" content="ca-pub-2629874051071785">


    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/remixicon.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/uicons-regular-rounded.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/flaticon_baxo.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/swiper.bundle.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/aos.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/header.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/footer.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/responsive.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/frontAssets/css/dark-theme.css") }}">








</head>

<body>
@include("layouts.front.partials.nawbar")
@yield("content")



<div class="container-fluid">
    <div class="footer-wrap">
        <div class="row align-items-center">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 text-center">
                <p class="copyright-text">© <span>İNTERNETAMCA</span> Tüm Hakları Saklıdır. <br>Tasarım <a href="https://www.internetamca.com/">İNTERNETAMCA.COM</a>
                </p>
            </div>
            <div class="col-lg-3">
                <div class="footer-right">

                </div>
            </div>
        </div>
    </div>
</div>


<button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
    <i class="ri-arrow-up-line"></i>
</button>


<script src="{{ asset("assets/frontAssets/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/js/swiper.bundle.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/js/aos.js") }}"></script>
<script src="{{ asset("assets/frontAssets/js/main.js") }}"></script>
</body>

</html>




















