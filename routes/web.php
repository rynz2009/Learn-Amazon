<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // List Product
    Route::delete('list-products/destroy', 'ListProductController@massDestroy')->name('list-products.massDestroy');
    Route::post('list-products/media', 'ListProductController@storeMedia')->name('list-products.storeMedia');
    Route::post('list-products/ckmedia', 'ListProductController@storeCKEditorImages')->name('list-products.storeCKEditorImages');
    Route::post('list-products/parse-csv-import', 'ListProductController@parseCsvImport')->name('list-products.parseCsvImport');
    Route::post('list-products/process-csv-import', 'ListProductController@processCsvImport')->name('list-products.processCsvImport');
    Route::resource('list-products', 'ListProductController');

    // Transaksi
    Route::delete('transaksis/destroy', 'TransaksiController@massDestroy')->name('transaksis.massDestroy');
    Route::post('transaksis/parse-csv-import', 'TransaksiController@parseCsvImport')->name('transaksis.parseCsvImport');
    Route::post('transaksis/process-csv-import', 'TransaksiController@processCsvImport')->name('transaksis.processCsvImport');
    Route::resource('transaksis', 'TransaksiController');

    // Detail Transaksi
    Route::delete('detail-transaksis/destroy', 'DetailTransaksiController@massDestroy')->name('detail-transaksis.massDestroy');
    Route::post('detail-transaksis/media', 'DetailTransaksiController@storeMedia')->name('detail-transaksis.storeMedia');
    Route::post('detail-transaksis/ckmedia', 'DetailTransaksiController@storeCKEditorImages')->name('detail-transaksis.storeCKEditorImages');
    Route::post('detail-transaksis/parse-csv-import', 'DetailTransaksiController@parseCsvImport')->name('detail-transaksis.parseCsvImport');
    Route::post('detail-transaksis/process-csv-import', 'DetailTransaksiController@processCsvImport')->name('detail-transaksis.processCsvImport');
    Route::resource('detail-transaksis', 'DetailTransaksiController');

    // Produk
    Route::delete('produks/destroy', 'ProdukController@massDestroy')->name('produks.massDestroy');
    Route::post('produks/parse-csv-import', 'ProdukController@parseCsvImport')->name('produks.parseCsvImport');
    Route::post('produks/process-csv-import', 'ProdukController@processCsvImport')->name('produks.processCsvImport');
    Route::resource('produks', 'ProdukController');

    // Transaksi Aff
    Route::delete('transaksi-affs/destroy', 'TransaksiAffController@massDestroy')->name('transaksi-affs.massDestroy');
    Route::post('transaksi-affs/parse-csv-import', 'TransaksiAffController@parseCsvImport')->name('transaksi-affs.parseCsvImport');
    Route::post('transaksi-affs/process-csv-import', 'TransaksiAffController@processCsvImport')->name('transaksi-affs.processCsvImport');
    Route::resource('transaksi-affs', 'TransaksiAffController');

    // Detail Transaksi Aff
    Route::delete('detail-transaksi-affs/destroy', 'DetailTransaksiAffController@massDestroy')->name('detail-transaksi-affs.massDestroy');
    Route::post('detail-transaksi-affs/parse-csv-import', 'DetailTransaksiAffController@parseCsvImport')->name('detail-transaksi-affs.parseCsvImport');
    Route::post('detail-transaksi-affs/process-csv-import', 'DetailTransaksiAffController@processCsvImport')->name('detail-transaksi-affs.processCsvImport');
    Route::resource('detail-transaksi-affs', 'DetailTransaksiAffController');

    // Niche
    Route::delete('niches/destroy', 'NicheController@massDestroy')->name('niches.massDestroy');
    Route::post('niches/parse-csv-import', 'NicheController@parseCsvImport')->name('niches.parseCsvImport');
    Route::post('niches/process-csv-import', 'NicheController@processCsvImport')->name('niches.processCsvImport');
    Route::resource('niches', 'NicheController');

    // Belanja
    Route::delete('belanjas/destroy', 'BelanjaController@massDestroy')->name('belanjas.massDestroy');
    Route::resource('belanjas', 'BelanjaController');

    // Hpp
    Route::delete('hpps/destroy', 'HppController@massDestroy')->name('hpps.massDestroy');
    Route::resource('hpps', 'HppController');

    // Customer Service
    Route::delete('customer-services/destroy', 'CustomerServiceController@massDestroy')->name('customer-services.massDestroy');
    Route::resource('customer-services', 'CustomerServiceController');

    // Penerimaan Cod
    Route::delete('penerimaan-cods/destroy', 'PenerimaanCodController@massDestroy')->name('penerimaan-cods.massDestroy');
    Route::resource('penerimaan-cods', 'PenerimaanCodController');

    // Detail Penerimaan Cod
    Route::delete('detail-penerimaan-cods/destroy', 'DetailPenerimaanCodController@massDestroy')->name('detail-penerimaan-cods.massDestroy');
    Route::resource('detail-penerimaan-cods', 'DetailPenerimaanCodController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
