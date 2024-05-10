@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Kategori Güncelleme Formu</h4>
                <p class="mb-30">Kategori Güncelleme Formu</p>
            </div>
        </div>
        <form action="{{ route("admin.category.updatePost",["id"=>$category[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Resim</label>
                <div class="col-sm-12 col-md-10">
                    <img src="{{ asset("imagesWebp/category/")."/".$category[0]["imageWebp"] }}" class="col-lg-3 mb-2" alt="">
                    <input class="form-control" type="file" name="categoryImage">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kategori Adı</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="categoryName" type="text" value="{{ $category[0]["name"] }}" placeholder="Lütfen kategori adını girin.">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kategori Description(Tanım)</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="categoryDescription" type="text" value="{{ $category[0]["description"] }}" placeholder="Lütfen kategori description bilgisini girin.">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-2 col-form-label"></div>
                <div class="col-sm-12 col-md-10">
                    <button class="btn btn-primary">Kaydet <i class="bi bi-plus-circle"></i></button>
                </div>
            </div>


        </form>

    </div>
@endsection
