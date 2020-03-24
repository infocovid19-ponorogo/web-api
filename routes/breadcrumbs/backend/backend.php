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
