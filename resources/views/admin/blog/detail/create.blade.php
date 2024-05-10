@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">İçerik Ekleme Formu</h4>
                <p class="mb-30">İçerik Ekleme Formu</p>
            </div>
        </div>
        <form action="{{ route("admin.blog.detail.create",["id"=>$id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Resim</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" name="detailImage">
                    <small class="text-danger">*resim yüklemek zorunlu değildir.</small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">İçerik Text</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="detailText" id="ckeditor" class="ckeditor">

                    </textarea>
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
