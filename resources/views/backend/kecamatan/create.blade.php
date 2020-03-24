@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')


@section('content')
{{ html()->form('POST', route('admin.kecamatan.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Manage Data Covid19 Kecamatan
                            <small class="text-muted">Tambah baru</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label("Nama Kecamatan")->class('col-md-2 form-control-label')->for('nama') }}

                            <div class="col-md-10">
                                {{ html()->text('nama')
                                    ->class('form-control')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Latitude")->class('col-md-2 form-control-label')->for('latitude') }}

                            <div class="col-md-10">
                                {{ html()->text('latitude')
                                    ->class('form-control')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Longitude")->class('col-md-2 form-control-label')->for('longitude') }}

                            <div class="col-md-10">
                                {{ html()->text('longitude')
                                    ->class('form-control')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah ODR")->class('col-md-2 form-control-label')->for('odr') }}

                            <div class="col-md-10">
                                {{ html()->text('odr')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah ODP")->class('col-md-2 form-control-label')->for('odp') }}

                            <div class="col-md-10">
                                {{ html()->text('odp')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah PDP")->class('col-md-2 form-control-label')->for('pdp') }}

                            <div class="col-md-10">
                                {{ html()->text('pdp')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah Probable")->class('col-md-2 form-control-label')->for('probable') }}

                            <div class="col-md-10">
                                {{ html()->text('probable')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah Positif")->class('col-md-2 form-control-label')->for('positif') }}

                            <div class="col-md-10">
                                {{ html()->text('positif')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah Meninggal")->class('col-md-2 form-control-label')->for('meninggal') }}

                            <div class="col-md-10">
                                {{ html()->text('meninggal')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Jumlah Sembuh")->class('col-md-2 form-control-label')->for('sembuh') }}

                            <div class="col-md-10">
                                {{ html()->text('sembuh')
                                    ->class('form-control')
                                    ->value(0)
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.kecamatan.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
