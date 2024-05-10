@extends("layouts.admin.index")

@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif




@endsection
