@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Berita <small class="text-muted">Daftar Berita</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
            </div><!--col-->
        </div><!--row-->

        {{-- if admin --}}
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Link</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $b)
                          <tr>
                            <td>{{$b->title }}</td>
                            <td>{{$b->author }}</td>
                            <td>{{$b->reference_link }}</td>
                            <td>{{$b->categories }}</td>
                            <td>
                              <div class="btn-group">
                                <a href="{{route('admin.news.show', $b)}}" class="btn btn-primary">Lihat</a>
                                <a href="{{route('admin.news.edit', $b)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('admin.news.destroy', $b)}}" class="btn btn-danger">Hapus</a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->

        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {!! $users->render() !!} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
