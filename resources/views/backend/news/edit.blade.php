@extends('backend.layouts.app')

@section('title', app_name() . ' | Bimbingan')

@push('after-styles')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endpush

@section('content')
{{ html()->modelForm($news, 'POST', route('admin.news.update', $news))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Manage Berita Covid19 Ponorogo
                            <small class="text-muted">Edit</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label("Judul Berita")->class('col-md-2 form-control-label')->for('title') }}
                            <div class="col-md-10">
                                {{ html()->text('title')
                                    ->class('form-control')
                                    ->placeholder('Judul Berita')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Konten")->class('col-md-2 form-control-label')->for('content') }}
                            <div class="col-md-10">
                                {{ html()->textarea('content')
                                    ->class('form-control')
                                    ->placeholder('Konten')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Author")->class('col-md-2 form-control-label')->for('author') }}
                            <div class="col-md-10">
                                {{ html()->text('author')
                                    ->class('form-control')
                                    ->placeholder('Author')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Link Referensi")->class('col-md-2 form-control-label')->for('reference_link') }}
                            <div class="col-md-10">
                                {{ html()->text('reference_link')
                                    ->class('form-control')
                                    ->placeholder('Link Referensi')
                                    ->required()
                                 }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label("Kategori")->class('col-md-2 form-control-label')->for('categories') }}
                            <div class="col-md-10">
                                {{ html()->multiselect('categories')
                                    ->class('form-control')
                                    ->options([
                                        'info' => 'Info',
                                        'penanganan' => 'Penanganan'
                                    ])
                                    ->placeholder('Kategori')
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
                        {{ form_cancel(route('admin.news.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.edit')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@push('after-scripts')
<script>
    CKEDITOR.replace('content')
</script>
@endpush