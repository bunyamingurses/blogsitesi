@extends("layouts.admin.index")
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Tüm Kategoriler <a href="{{ route("admin.category.create") }}"
                                                        title="Kategori Ekle" class="btn btn-primary">Kategori Ekle <i
                        class="bi bi-plus-circle"></i></a></h4>
        </div>
        <div class="pb-20">
            <table class="table table-responsive-lg hover multiple-select-row">
                <thead>
                <tr>
                    <th>Resim</th>
                    <th>Kategori</th>
                    <th>Description</th>
                    <th>Aktif</th>
                    <th>Popüler</th>
                    <th>Eklenme Tarihi</th>
                    <th>Bloglar</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $categoryWrite)
                    <tr>
                        <td><img src="{{ asset("imagesWebp/category/$categoryWrite->imageWebp") }}"
                                 title="Kategorinin Fotoğrafı" width="150" alt="">
                        </td>
                        <td>{{ $categoryWrite->name }}</td>
                        <td>{{ $categoryWrite->description }}</td>
                        <td>
                            @if($categoryWrite->isEnable)
                                <a href="{{ route("admin.category.enable",["id"=>$categoryWrite->id]) }}" class="btn btn-outline-success">Aktif <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.category.enable",["id"=>$categoryWrite->id]) }}" class="btn btn-outline-danger">Pasif <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>
                        <td>
                            @if($categoryWrite->isPopular)
                                <a href="{{ route("admin.category.popular",["id"=>$categoryWrite->id]) }}" class="btn btn-outline-success">Popüler <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.category.popular",["id"=>$categoryWrite->id]) }}" class="btn btn-outline-danger">Poğüler Değil <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>
                        <td>{{ substr($categoryWrite->created_at,0,11) }}</td>
                        <td>
                            <button class="btn btn-outline-dark" title="Kategorini Blogları"><i class="fa fa-image"></i>
                            </button>
                        </td>
                        <td>
                            <div class="row">

                                <form action="{{ route("admin.category.update",["id"=>$categoryWrite->id]) }}">
                                    <button class="btn btn-outline-dark" title="Kategori Güncelle" type="submit"><i
                                            class="fa fa-refresh"></i></button>
                                </form>
                                <form action="{{ route("admin.category.delete",["id"=>$categoryWrite->id]) }}"
                                      method="get">
                                    <button class="btn btn-outline-dark" title="Kategori Sil" type="submit"><i
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
