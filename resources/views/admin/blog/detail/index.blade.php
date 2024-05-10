@extends("layouts.admin.index")
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif

    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ asset("imagesWebp/blog/")."/".$blog[0]["imageWebp"] }}" alt="">
                    </div>
                    <div class="col-lg-9">
                        <table>
                            <tr>
                                <td><span class="text-blue font-24">Blog Adı:</span></td>
                                <td><span class="font-24">{{ $blog[0]["name"] }}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-blue font-24">Blog Kategori:</span></td>
                                <td><span class="font-24">{{ \App\Models\blog_category::getSingleName($blog[0]["categoryId"]) }}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-blue font-24">Aktif:</span></td>
                                <td  class="font-24">
                                    @if($blog[0]["isEnable"]==1)
                                        <span class="badge badge-success mb-2">Aktif</span>
                                    @else
                                        <span class="badge badge-danger mb-2">Pasif</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-blue font-24">Popüler:</span></td>
                                <td  class="font-24">
                                    @if($blog[0]["isPopular"]==1)
                                        <span class="badge badge-success">Popüler</span>
                                    @else
                                        <span class="badge badge-danger">Popüler değil</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Tüm İçerikler <a href="{{ route("admin.blog.detail.create",["id"=>$blog[0]["id"]]) }}"
                                                    title="Kategori Ekle" class="btn btn-primary">İçerik Ekle <i
                        class="bi bi-plus-circle"></i></a></h4>
        </div>
        <div class="pb-20">
            <table class="table table-responsive-lg hover multiple-select-row ">
                <thead>
                <tr>
                    <th>Resim</th>
                    <th>içerik</th>
                    <th>Blog</th>
                    <th>Eklenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail as $detailWrite)
                    <tr>
                        <td><img src="{{ asset("imagesWebp/blog/detail/$detailWrite->imageWebp") }}"
                                 title="Bloğun Fotoğrafı"  width="150" alt="Fotoğraf Yok">
                        </td>
                        <td>{{ $detailWrite->name }}</td>
                        <td>{!! htmlspecialchars_decode($detailWrite->text) !!}</td>
                        <td>{{ substr($detailWrite->created_at,0,11) }}</td>
                        <td>
                            <div class="row">

                                <form action="{{ route("admin.blog.detail.update",["id"=>$detailWrite->id]) }}">
                                    <button class="btn btn-outline-dark" title="İçerik Güncelle" type="submit"><i
                                            class="fa fa-refresh"></i></button>
                                </form>
                                <form action="{{ route("admin.blog.detail.delete",["id"=>$detailWrite->id]) }}"
                                      method="get">
                                    <button class="btn btn-outline-dark" title="İçerik Sil" type="submit"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Export Datatable End -->
@endsection
