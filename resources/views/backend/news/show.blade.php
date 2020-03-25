@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Data Berita <small class="text-muted">{{$news->title}}</small>
                </h4>
            </div>
        </div>

    </div><!--card-body-->
</div><!--card-->
@endsection
