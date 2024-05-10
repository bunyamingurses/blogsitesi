@extends("layouts.admin.index")
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif


    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Blog Yorumları</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                <tr>
                    <th>Blog</th>
                    <th>İsim Soyisim</th>
                    <th>E-Posta Adresi</th>
                    <th>Yorum</th>
                    <th>Aktif</th>
                    <th>Eklenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comment as $commentWrite)
                    <tr>
                        </td>
                        <td>{{ \App\Models\blog_blog::getSingleName($commentWrite->blog_id) }}</td>
                        <td>{{ $commentWrite->name }}</td>
                        <td>{{ $commentWrite->email }}</td>
                        <td>{{ $commentWrite->comment }}</td>
                        <td>
                            @if($commentWrite->enable)
                                <a href="{{ route("admin.blog.comment.enable",["id"=>$commentWrite->id]) }}" class="btn btn-outline-success">Aktif <i class="fa fa-check-circle"></i></a>
                            @else
                                <a href="{{ route("admin.blog.comment.enable",["id"=>$commentWrite->id]) }}" class="btn btn-outline-danger">Pasif <i class="fa fa-times-circle"></i></a>
                            @endif
                        </td>

                        <td>{{ substr($commentWrite->created_at,0,11) }}</td>
                        <td>
                            <div class="row">
                                <form action="{{ route("admin.blog.comment.delete",["id"=>$commentWrite->id]) }}"
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
