<?php
Route::resource('demo/vendors', 'Vendor\Module\VendorController');
Route::get('demo/vendors/show_vendor/{id}', 'Vendor\Module\VendorController@show_vendor');
Route::post('demo/vendor/reject', 'Vendor\Module\VendorController@rejectVendor');
Route::post('demo/venderService/changeStatus', 'Vendor\Module\VendorController@changeVenderServiceStatus');
Route::post('demo/venderService/addVenderService', 'Vendor\Module\VendorController@addVenderService');
Route::post('demo/venderService/delete', 'Vendor\Module\VenderServiceController@destroy');
Route::post('demo/vendorSlots/delete', 'Vendor\Module\VendorController@deleteVendorSlot');
Route::get('demo/venderService/editVenderService/{id}', 'Vendor\Module\VenderServiceController@edit')->name('editVenderService');
Route::get('demo/vendor/editVender/{id}', 'Vendor\Module\VendorController@edit')->name('editVender');
Route::any('demo/updateVenderService/{id}', 'Vendor\Module\VenderServiceController@update')->name('updateVenderService');