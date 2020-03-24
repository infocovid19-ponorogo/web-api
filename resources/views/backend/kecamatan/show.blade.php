@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Data Kecamatan <small class="text-muted">{{$kecamatan->nama}}</small>
                </h4>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-5">
                Lat/Long
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->latitude.'/'.$kecamatan->longitude }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                ODR
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->odr }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                ODP
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->odp }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                PDP
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->pdp }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                Probable
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->probable }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                Positif
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->positif }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                Meninggal
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->meninggal }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                Sembuh
            </div>
            <div class="col-sm-7">
                {{ $kecamatan->sembuh }}
            </div>
        </div>

    </div><!--card-body-->
</div><!--card-->
@endsection
