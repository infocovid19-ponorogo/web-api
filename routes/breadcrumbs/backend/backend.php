<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.kecamatan.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('kecamatan', route('admin.kecamatan.index'));
});

Breadcrumbs::for('admin.kecamatan.create', function ($trail) {
    $trail->parent('admin.kecamatan.index');
    $trail->push('Tambah', route('admin.kecamatan.create'));
});

Breadcrumbs::for('admin.kecamatan.show', function ($trail, $id) {
    $trail->parent('admin.kecamatan.index');
    $trail->push('Tambah', route('admin.kecamatan.show', $id));
});

Breadcrumbs::for('admin.kecamatan.edit', function ($trail, $id) {
    $trail->parent('admin.kecamatan.index');
    $trail->push('Tambah', route('admin.kecamatan.edit', $id));
});


//provinsi

Breadcrumbs::for('admin.provinsi.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('provinsi', route('admin.provinsi.index'));
});

Breadcrumbs::for('admin.provinsi.create', function ($trail) {
    $trail->parent('admin.provinsi.index');
    $trail->push('Tambah', route('admin.provinsi.create'));
});

Breadcrumbs::for('admin.provinsi.show', function ($trail, $id) {
    $trail->parent('admin.provinsi.index');
    $trail->push('Tambah', route('admin.provinsi.show', $id));
});

Breadcrumbs::for('admin.provinsi.edit', function ($trail, $id) {
    $trail->parent('admin.provinsi.index');
    $trail->push('Tambah', route('admin.provinsi.edit', $id));
});


Breadcrumbs::for('admin.news.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('News', route('admin.news.index'));
});

Breadcrumbs::for('admin.news.create', function ($trail) {
    $trail->parent('admin.news.index');
    $trail->push('Tambah', route('admin.news.create'));
});

Breadcrumbs::for('admin.news.show', function ($trail, $id) {
    $trail->parent('admin.news.index');
    $trail->push('Tambah', route('admin.news.show', $id));
});

Breadcrumbs::for('admin.news.edit', function ($trail, $id) {
    $trail->parent('admin.news.index');
    $trail->push('Tambah', route('admin.news.edit', $id));
});