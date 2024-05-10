@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Kategori Ekleme Formu</h4>
                <p class="mb-30">Kategori Ekleme Formu</p>
            </div>
        </div>
        <form action="{{ route("admin.category.create") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Resim</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" name="categoryImage">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kategori Adı</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="categoryName" type="text" placeholder="Lütfen kategori adını girin.">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kategori Description(Tanım)</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="categoryDescription" type="text" placeholder="Lütfen kategori description bilgisini girin.">
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
