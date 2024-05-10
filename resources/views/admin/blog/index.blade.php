@extends("layouts.admin.index")
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Tüm Bloglar <a href="{{ route("admin.blog.create") }}" title="Kategori Ekle" class="btn btn-primary">Blog Ekle <i class="bi bi-plus-circle"></i></a></h4>
        </div>
        <div class="pb-20">
            <table class="table table-responsive-lg hover multiple-select-row">
                <thead>
                <tr>
                    <th>Resim</th>
                    <th>Blog</th>
                    <th>Kategori</th>
                    <th>Etiketler</th>
                    <th>Aktif</th>
                    <th>Popüler</th>
                    <th>Carousel</th>
                    <th>Yorumlar</th>
                    <th>Eklenme Tarihi</th>
                    <th>Ziyaret</th>
                    <th>İçerikler</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blog as $blogWrite)
                    <tr>
                        <td><img src="{{ asset("imagesWebp/blog/$blogWrite->imageWebp") }}" title="Bloğun Fotoğrafı" width="150" alt=""></td>
                        <td>{{ $blogWrite->name }}</td>
                        <td>{{ \App\Models\blog_category::getSingleName($blogWrite->categoryId) }}</td>
                        <td>
                            @php
                                $etiket=explode(",",$blogWrite->tags);
                            @endphp
                            <button
                                type="button"
                                class="btn btn-outline-primary"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="top"
                                data-content="@foreach ($etiket as $etiketYaz)
                                {{ $etiketYaz."," }}
                            @endforeach"
                                title="popover"
                            >
                                <i class="fa fa-ticket"></i> Etiketler
                            </button>

                        </td>
                        <td>
                            @if($blogWrite->isEnable)
                                <a href="{{ route("admin.blog.enable",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-success">Aktif <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.blog.enable",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-danger">Pasif <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>
                        <td>
                            @if($blogWrite->isPopular)
                                <a href="{{ route("admin.blog.popular",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-success">Popüler <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.blog.popular",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-danger">Poğüler Değil <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>
                        <td>
                            @if($blogWrite->isCarousel)
                                <a href="{{ route("admin.blog.carousel",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-success">Carousel <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.blog.carousel",["id"=>$blogWrite->id]) }}"
                                   class="btn btn-outline-danger">Carousel Değil <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>
                        <td><a href="{{ route("admin.blog.comment.index",["id"=>$blogWrite->id]) }}"
                               class="btn btn-outline-info">Yorumlar <i class="fa fa-comment"></i></a></td>
                        <td>{{ substr($blogWrite->created_at,0,11) }}</td>
                        <td>{{ $blogWrite->readCount }}</td>
                        <td>
                            <a href="{{ route("admin.blog.detail.index",["id"=>$blogWrite->id]) }}"
                               class="btn btn-outline-dark" title="Bloğun içerikleri"><i class="fa fa-image"></i>
                            </a>
                        </td>
                        <td>
                            <div class="row">

                                <form action="{{ route("admin.blog.update",["id"=>$blogWrite->id]) }}">
                                    <button class="btn btn-outline-dark" title="Blog Güncelle" type="submit"><i
                                            class="fa fa-refresh"></i></button>
                                </form>
                                <form action="{{ route("admin.blog.delete",["id"=>$blogWrite->id]) }}"
                                      method="get">
                                    <button class="btn btn-outline-dark" title="Blog Sil" type="submit"><i
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
