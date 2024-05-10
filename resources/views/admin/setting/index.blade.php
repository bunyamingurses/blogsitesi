@extends("layouts.admin.index ")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30 ">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Ayarlar Formu</h4>
                <p class="mb-30">Ayarlar Formu</p>
            </div>
        </div>

        @if(isset($setting[0]["title"]))
            <form action="{{ route("admin.setting.update") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Logo</label>
                    <div class="col-sm-12 col-md-10">
                        <img src="{{ asset("imagesWebp/site/")."/".(@$setting[0]["logoWebp"]) }}" class="col-lg-3 mb-2"
                             alt="Siteye henüz logo eklenmemiş.">
                        <input class="form-control" type="file" name="siteLogo">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Site Url</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteUrl" type="text" value="{{ @$setting[0]["siteUrl"] }}"
                               placeholder="Lütfen sitenin url bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteTitle" type="text" value="{{ @$setting[0]["title"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteDescription" type="text"
                               value="{{ @$setting[0]["description"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Keyword</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteKeyword" type="text" value="{{ @$setting[0]["keyword"] }}"
                               placeholder="Lütfen sitenin keyword bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Author</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteAuthor" type="text" value="{{ @$setting[0]["author"] }}"
                               placeholder="Lütfen sitenin author bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Telefon</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="sitePhone" type="text" value="{{ @$setting[0]["phoneNumber"] }}"
                               placeholder="Lütfen sitenin telefon bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">E-Posta Hesabı</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteEmail" type="email" value="{{ @$setting[0]["email"] }}"
                               placeholder="Lütfen sitenin e-posta bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">googleMap</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteGoogleMap" type="text" value="{{ @$setting[0]["googleMap"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Google Analytics</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteGoogleAnalytics" type="text"
                               value="{{ @$setting[0]["googleAnalytics"] }}"
                               placeholder="Lütfen sitenin Google Analytics bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 col-md-2 col-form-label"></div>
                    <div class="col-sm-12 col-md-10">
                        <button class="btn btn-primary">Ayarları Kaydet <i class="bi bi-plus-circle"></i></button>
                    </div>
                </div>

            </form>

        @else
            <form action="{{ route("admin.setting.create") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Logo</label>
                    <div class="col-sm-12 col-md-10">
                        <img src="{{ asset("imagesWebp/site/")."/".(@$setting[0]["logoWebp"]) }}" class="col-lg-3 mb-2"
                             alt="Siteye henüz logo eklenmemiş.">
                        <input class="form-control" type="file" name="siteLogo">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Site Url</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteUrl" type="text" value="{{ @$setting[0]["siteUrl"] }}"
                               placeholder="Lütfen sitenin url bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteTitle" type="text" value="{{ @$setting[0]["title"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteDescription" type="text"
                               value="{{ @$setting[0]["description"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Keyword</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteKeyword" type="text" value="{{ @$setting[0]["keyword"] }}"
                               placeholder="Lütfen sitenin keyword bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Author</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteAuthor" type="text" value="{{ @$setting[0]["author"] }}"
                               placeholder="Lütfen sitenin author bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Telefon</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="sitePhone" type="text" value="{{ @$setting[0]["phoneNumber"] }}"
                               placeholder="Lütfen sitenin telefon bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">E-Posta Hesabı</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteEmail" type="email" value="{{ @$setting[0]["email"] }}"
                               placeholder="Lütfen sitenin e-posta bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">googleMap</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteGoogleMap" type="text" value="{{ @$setting[0]["googleMap"] }}"
                               placeholder="Lütfen sitenin title bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Google Analytics</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="siteGoogleAnalytics" type="text"
                               value="{{ @$setting[0]["googleAnalytics"] }}"
                               placeholder="Lütfen sitenin Google Analytics bilgisini girin.">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 col-md-2 col-form-label"></div>
                    <div class="col-sm-12 col-md-10">
                        <button class="btn btn-primary">Ayarları Kaydet <i class="bi bi-plus-circle"></i></button>
                    </div>
                </div>

            </form>

        @endif


    </div>

@endsection
