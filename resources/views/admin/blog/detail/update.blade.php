@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">İçerik Güncelleme Formu</h4>
                <p class="mb-30">İçerik Ekleme Formu</p>
            </div>
        </div>
        <form action="{{ route("admin.blog.detail.update",["id"=>$id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Resim</label>
                <div class="col-sm-12 col-md-10">
                    <img src="{{ asset("imagesWebp/blog/detail/")."/".$detail[0]["imageWebp"] }}" class="col-lg-3 mb-2" alt="">
                    <input class="form-control" type="file" name="detailImage">
                    <small class="text-danger">*resim yüklemek zorunlu değildir.</small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">İçerik Text</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="detailText" id="ckeditor" class="ckeditor">
                        {{ html_entity_decode($detail[0]["text"]) }}
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-2 col-form-label"></div>
                <div class="col-sm-12 col-md-10">
                    <input type="hidden" name="blog_id" value="{{ $detail[0]["blog_id"] }}">
                    <button class="btn btn-primary">Kaydet <i class="bi bi-plus-circle"></i></button>
                </div>
            </div>


        </form>

    </div>
@endsection
