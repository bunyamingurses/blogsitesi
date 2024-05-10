@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Blog Ekleme Formu</h4>
                <p class="mb-30">Blog Ekleme Formu</p>
            </div>
        </div>
        <form action="{{ route("admin.blog.create") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Resim</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" name="blogImage">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Blog Adı</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="blogName" type="text" placeholder="Lütfen blog adını girin.">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Blog Kategori</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select2 form-control" name="categoryId" style="width: 100%; height: 38px">
                        <option selected disabled>Lütfen kategori seçin.</option>
                        <optgroup label="Kategoriler">
                            @foreach($category as $categoryWrite)
                                <option value="{{ $categoryWrite->id }}">{{ $categoryWrite->name }}</option>

                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Blog Etiketleri</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="blogTags" type="text" placeholder="Lütfen blog etiketlerini girin.">
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
