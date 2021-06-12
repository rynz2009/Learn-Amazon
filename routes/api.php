<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // List Product
    Route::post('list-products/media', 'ListProductApiController@storeMedia')->name('list-products.storeMedia');
    Route::apiResource('list-products', 'ListProductApiController');

    // Transaksi
    Route::apiResource('transaksis', 'TransaksiApiController');

    // Detail Transaksi
    Route::post('detail-transaksis/media', 'DetailTransaksiApiController@storeMedia')->name('detail-transaksis.storeMedia');
    Route::apiResource('detail-transaksis', 'DetailTransaksiApiController');

    // Produk
    Route::apiResource('produks', 'ProdukApiController');

    // Transaksi Aff
    Route::apiResource('transaksi-affs', 'TransaksiAffApiController');

    // Detail Transaksi Aff
    Route::apiResource('detail-transaksi-affs', 'DetailTransaksiAffApiController');

    // Niche
    Route::apiResource('niches', 'NicheApiController');

    // Belanja
    Route::apiResource('belanjas', 'BelanjaApiController');

    // Hpp
    Route::apiResource('hpps', 'HppApiController');

    // Customer Service
    Route::apiResource('customer-services', 'CustomerServiceApiController');

    // Penerimaan Cod
    Route::apiResource('penerimaan-cods', 'PenerimaanCodApiController');

    // Detail Penerimaan Cod
    Route::apiResource('detail-penerimaan-cods', 'DetailPenerimaanCodApiController');
});
