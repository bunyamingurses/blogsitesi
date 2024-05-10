<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8"/>
    <title>WWW.İNTERNETAMCA.COM</title>

    <!-- Site favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset("assets/adminAssets/vendors/images/apple-touch-icon.png") }}"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset("assets/adminAssets/vendors/images/favicon-32x32.png") }}"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset("assets/adminAssets/vendors/images/favicon-16x16.png") }}"
    />

    <!-- Mobile Specific Metas -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/adminAssets/vendors/styles/core.css") }}"/>
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset("assets/adminAssets/vendors/styles/icon-font.min.css") }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset("assets/adminAssets/src/plugins/datatables/css/dataTables.bootstrap4.min.css") }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset("assets/adminAssets/src/plugins/datatables/css/responsive.bootstrap4.min.css") }}"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/adminAssets/vendors/styles/style.css") }}"/>
    <script src="{{ asset("assets/adminAssets/ckeditor/ckeditor.js") }}"></script>


</head>
<body>
<div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo">
            <p class="font-30">İNTERNET AMCA <span class="fa fa-globe"></span></p>
        </div>
        <div class="loader-progress" id="progress_div">
            <div class="bar" id="bar1"></div>
        </div>
        <div class="percent" id="percent1">0%</div>
        <div class="loading-text">Yükleniyor...</div>
    </div>
</div>


<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{ asset("assets/adminAssets/vendors/images/login-page-img.png") }}" alt=""/>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">İNTERNETAMCA <i class="fa fa-globe"></i></h2>
                    </div>
                    <form action="{{ route("login.loginPost") }}" method="post">
                        @csrf
                        <div class="input-group custom">
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                name="userUsername"
                                placeholder="Kullanıcıadı"
                            />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" name="userPassword" placeholder="Parola"/>
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row pb-30 justify-content-center">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            @if(session("status"))
                                {{ session("status") }}
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group mb-0">
                                    <button class="btn btn-primary btn-lg btn-block">Giriş Yap <i class="bi bi-door-open"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- js -->
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/core.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/script.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/process.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/layout-settings.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/jquery.dataTables.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/dataTables.bootstrap4.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/dataTables.responsive.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/responsive.bootstrap4.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/dashboard3.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/dataTables.buttons.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/buttons.bootstrap4.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/buttons.print.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/buttons.html5.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/buttons.flash.min.js") }}"></script>
<script type="text/javascript"
        src="{{ asset("assets/adminAssets/src/plugins/datatables/js/pdfmake.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/adminAssets/src/plugins/datatables/js/vfs_fonts.js") }}"></script>
<!-- Datatable Setting js -->
<script type="text/javascript" src="{{ asset("assets/adminAssets/vendors/scripts/datatable-setting.js") }}"></script>


<script>
    CKEDITOR.replace('ckeditor');
</script>
</body>
</html>
