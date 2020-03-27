@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Provinsi <small class="text-muted">Daftar</small>
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
                            
                            <th>ODP</th>
                            <th>ODR</th>
                            <th>PDP</th>
                            <th>Probable</th>
                            <th>Positif</th>
                            <th>Meninggal</th>
                            <th>Sembuh</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $b)
                          <tr>
                            <td>{{$b->odp }}</td>
                            <td>{{$b->odr }}</td>
                            <td>{{$b->pdp }}</td>
                            <td>{{$b->probable }}</td>
                            <td>{{$b->positif }}</td>
                            <td>{{$b->meninggal }}</td>
                            <td>{{$b->sembuh }}</td>
                            <td>
                              <div class="btn-group">
                                <a href="{{route('admin.provinsi.show', $b)}}" class="btn btn-primary">Lihat</a>
                                <a href="{{route('admin.provinsi.edit', $b)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('admin.provinsi.destroy', $b)}}" class="btn btn-danger">Hapus</a>
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
