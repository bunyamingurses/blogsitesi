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
{{--<div class="pre-loader">--}}
{{--    <div class="pre-loader-box">--}}
{{--        <div class="loader-logo">--}}
{{--            <p class="font-30">İNTERNET AMCA <span class="fa fa-globe"></span></p>--}}
{{--        </div>--}}
{{--        <div class="loader-progress" id="progress_div">--}}
{{--            <div class="bar" id="bar1"></div>--}}
{{--        </div>--}}
{{--        <div class="percent" id="percent1">0%</div>--}}
{{--        <div class="loading-text">Yükleniyor...</div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>

    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="javascript:;"
                    data-toggle="right-sidebar"
                >
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a
                    class="dropdown-toggle"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                >
							<span class="user-icon">
                            <i class="fa fa-user-circle w-100"></i>
                            {{--<img src="" class="h-100" alt=""/>--}}
							</span>
                    <span class="user-name">Bünyamin</span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                >
                    <a class="dropdown-item" href="{{ route("login.logOut") }}"
                    ><i class="dw dw-logout"></i> Çıkış Yap</a
                    >
                </div>
            </div>
        </div>

    </div>
</div>

<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Tasarım Ayarları
            <span class="btn-block font-weight-400 font-12"
            >Tasarım Renk Ayarları</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Arkaplan Rengi</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-white active"
                >Açık(Beyaz)</a>
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary header-dark"
                >Koyu(Siyah)</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menü Arkaplan Renigi</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-light"
                >Açık(Beyaz)</a>
                <a
                    href="javascript:void(0);"
                    class="btn btn-outline-primary sidebar-dark active"
                >Koyu(Siyah)</a>
            </div>

        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route("admin.index") }}">

            <img src="{{ asset("assets/logoWhite.png") }}" alt="" class="dark-logo"/>
            <img src="{{ asset("assets/logoDark.png") }}" alt="" class="light-logo"/>

        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route("admin.index") }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house-door"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route("admin.setting.index")}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-tools"></span><span class="mtext">Ayarlar</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-layers"></span><span class="mtext">Kategori</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("admin.category.index") }}">Kategoriler</a></li>
                        <li><a href="{{ route("admin.category.create") }}">Kategori Ekle</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-layout-text-window"></span><span class="mtext">Blog</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("admin.blog.index") }}">Bloglar</a></li>
                        <li><a href="{{ route("admin.blog.create") }}">Blog Ekle</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route("admin.blog.comment.all")}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-chat-dots"></span><span class="mtext">Yorumlar</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        @yield("content")

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
