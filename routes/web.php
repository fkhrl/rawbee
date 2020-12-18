<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/index', 'IndexController@home');
 Route::get('/about', 'IndexController@about');
 Route::get('/service', 'IndexController@service');
 Route::get('/product-category/{cid}/{any}', 'IndexController@product');
 Route::get('/products/{cid}/subcategory/{sid}/{any}', 'IndexController@productDetail');
 Route::get('/contact', 'IndexController@contact');
 Route::post('/quote/request', 'IndexController@contactRequest');

 Route::group(['middleware' => ['auth']], function () {
    Route::get('/crud', 'CrudController@crud')->name('crud');
    Route::post('/crud', 'CrudController@crudgenarate')->name('crudgenarate');
    
    //======================== Sitesetting Route Start ===============================//
    Route::get('/sitesetting/list','SitesettingController@show');
    Route::get('/sitesetting/create','SitesettingController@create');
    Route::get('/sitesetting/edit/{id}','SitesettingController@edit');
    Route::get('/sitesetting/delete/{id}','SitesettingController@destroy');
    Route::get('/sitesetting','SitesettingController@index');
    Route::get('/sitesetting/export/excel','SitesettingController@ExportExcel');
    Route::get('/sitesetting/export/pdf','SitesettingController@ExportPDF');
    Route::post('/sitesetting','SitesettingController@store');
    Route::post('/sitesetting/ajax','SitesettingController@ajaxSave');
    Route::post('/sitesetting/datatable/ajax','SitesettingController@datatable');
    Route::post('/sitesetting/update/{id}','SitesettingController@update');
    //======================== Sitesetting Route End ===============================//
    //======================== Aboutus Route Start ===============================//
    Route::get('/aboutus/list','AboutusController@show');
    Route::get('/aboutus/create','AboutusController@create');
    Route::get('/aboutus/edit/{id}','AboutusController@edit');
    Route::get('/aboutus/delete/{id}','AboutusController@destroy');
    Route::get('/aboutus','AboutusController@index');
    Route::get('/aboutus/export/excel','AboutusController@ExportExcel');
    Route::get('/aboutus/export/pdf','AboutusController@ExportPDF');
    Route::post('/aboutus','AboutusController@store');
    Route::post('/aboutus/ajax','AboutusController@ajaxSave');
    Route::post('/aboutus/datatable/ajax','AboutusController@datatable');
    Route::post('/aboutus/update/{id}','AboutusController@update');
    //======================== Aboutus Route End ===============================//
    //======================== Slider Route Start ===============================//
    Route::get('/slider/list','SliderController@show');
    Route::get('/slider/create','SliderController@create');
    Route::get('/slider/edit/{id}','SliderController@edit');
    Route::get('/slider/delete/{id}','SliderController@destroy');
    Route::get('/slider','SliderController@index');
    Route::get('/slider/export/excel','SliderController@ExportExcel');
    Route::get('/slider/export/pdf','SliderController@ExportPDF');
    Route::post('/slider','SliderController@store');
    Route::post('/slider/ajax','SliderController@ajaxSave');
    Route::post('/slider/datatable/ajax','SliderController@datatable');
    Route::post('/slider/update/{id}','SliderController@update');
    //======================== Slider Route End ===============================//
    //======================== Ourservice Route Start ===============================//
    Route::get('/ourservice/list','OurserviceController@show');
    Route::get('/ourservice/create','OurserviceController@create');
    Route::get('/ourservice/edit/{id}','OurserviceController@edit');
    Route::get('/ourservice/delete/{id}','OurserviceController@destroy');
    Route::get('/ourservice','OurserviceController@index');
    Route::get('/ourservice/export/excel','OurserviceController@ExportExcel');
    Route::get('/ourservice/export/pdf','OurserviceController@ExportPDF');
    Route::post('/ourservice','OurserviceController@store');
    Route::post('/ourservice/ajax','OurserviceController@ajaxSave');
    Route::post('/ourservice/datatable/ajax','OurserviceController@datatable');
    Route::post('/ourservice/update/{id}','OurserviceController@update');
    //======================== Ourservice Route End ===============================//
    //======================== Category Route Start ===============================//
    Route::get('/category/list','CategoryController@show');
    Route::get('/category/create','CategoryController@create');
    Route::get('/category/edit/{id}','CategoryController@edit');
    Route::get('/category/delete/{id}','CategoryController@destroy');
    Route::get('/category','CategoryController@index');
    Route::get('/category/export/excel','CategoryController@ExportExcel');
    Route::get('/category/export/pdf','CategoryController@ExportPDF');
    Route::post('/category','CategoryController@store');
    Route::post('/category/ajax','CategoryController@ajaxSave');
    Route::post('/category/datatable/ajax','CategoryController@datatable');
    Route::post('/category/update/{id}','CategoryController@update');
    //======================== Category Route End ===============================//
    //======================== Subcategory Route Start ===============================//
    Route::get('/subcategory/list','SubcategoryController@show');
    Route::get('/subcategory/create','SubcategoryController@create');
    Route::get('/subcategory/edit/{id}','SubcategoryController@edit');
    Route::get('/subcategory/delete/{id}','SubcategoryController@destroy');
    Route::get('/subcategory','SubcategoryController@index');
    Route::get('/subcategory/export/excel','SubcategoryController@ExportExcel');
    Route::get('/subcategory/export/pdf','SubcategoryController@ExportPDF');
    Route::post('/subcategory','SubcategoryController@store');
    Route::post('/subcategory/ajax','SubcategoryController@ajaxSave');
    Route::post('/subcategory/datatable/ajax','SubcategoryController@datatable');
    Route::post('/subcategory/update/{id}','SubcategoryController@update');
    //======================== Subcategory Route End ===============================//
    //======================== Ourproduct Route Start ===============================//
    Route::get('/ourproduct/list','OurproductController@show');
    Route::get('/ourproduct/create','OurproductController@create');
    Route::get('/ourproduct/edit/{id}','OurproductController@edit');
    Route::get('/ourproduct/delete/{id}','OurproductController@destroy');
    Route::get('/ourproduct','OurproductController@index');
    Route::get('/ourproduct/export/excel','OurproductController@ExportExcel');
    Route::get('/ourproduct/export/pdf','OurproductController@ExportPDF');
    Route::post('/ourproduct','OurproductController@store');
    Route::post('/ourproduct/ajax','OurproductController@ajaxSave');
    Route::post('/ourproduct/datatable/ajax','OurproductController@datatable');
    Route::post('/ourproduct/update/{id}','OurproductController@update');
    Route::post('/product/ajax/subCatData', 'OurproductController@ajaxSubCat');
    //======================== Ourproduct Route End ===============================//
    //======================== Faq Route Start ===============================//
    Route::get('/faq/list','FaqController@show');
    Route::get('/faq/create','FaqController@create');
    Route::get('/faq/edit/{id}','FaqController@edit');
    Route::get('/faq/delete/{id}','FaqController@destroy');
    Route::get('/faq','FaqController@index');
    Route::get('/faq/export/excel','FaqController@ExportExcel');
    Route::get('/faq/export/pdf','FaqController@ExportPDF');
    Route::post('/faq','FaqController@store');
    Route::post('/faq/ajax','FaqController@ajaxSave');
    Route::post('/faq/datatable/ajax','FaqController@datatable');
    Route::post('/faq/update/{id}','FaqController@update');
    //======================== Faq Route End ===============================//
	
});




//======================== Category Route Start ===============================//
Route::get('/category/list','CategoryController@show');
Route::get('/category/create','CategoryController@create');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::get('/category/delete/{id}','CategoryController@destroy');
Route::get('/category','CategoryController@index');
Route::get('/category/export/excel','CategoryController@ExportExcel');
Route::get('/category/export/pdf','CategoryController@ExportPDF');
Route::post('/category','CategoryController@store');
Route::post('/category/ajax','CategoryController@ajaxSave');
Route::post('/category/datatable/ajax','CategoryController@datatable');
Route::post('/category/update/{id}','CategoryController@update');
//======================== Category Route End ===============================//
//======================== Subcategory Route Start ===============================//
Route::get('/subcategory/list','SubcategoryController@show');
Route::get('/subcategory/create','SubcategoryController@create');
Route::get('/subcategory/edit/{id}','SubcategoryController@edit');
Route::get('/subcategory/delete/{id}','SubcategoryController@destroy');
Route::get('/subcategory','SubcategoryController@index');
Route::get('/subcategory/export/excel','SubcategoryController@ExportExcel');
Route::get('/subcategory/export/pdf','SubcategoryController@ExportPDF');
Route::post('/subcategory','SubcategoryController@store');
Route::post('/subcategory/ajax','SubcategoryController@ajaxSave');
Route::post('/subcategory/datatable/ajax','SubcategoryController@datatable');
Route::post('/subcategory/update/{id}','SubcategoryController@update');
//======================== Subcategory Route End ===============================//
//======================== Client Route Start ===============================//
Route::get('/client/list','ClientController@show');
Route::get('/client/create','ClientController@create');
Route::get('/client/edit/{id}','ClientController@edit');
Route::get('/client/delete/{id}','ClientController@destroy');
Route::get('/client','ClientController@index');
Route::get('/client/export/excel','ClientController@ExportExcel');
Route::get('/client/export/pdf','ClientController@ExportPDF');
Route::post('/client','ClientController@store');
Route::post('/client/ajax','ClientController@ajaxSave');
Route::post('/client/datatable/ajax','ClientController@datatable');
Route::post('/client/update/{id}','ClientController@update');
//======================== Client Route End ===============================//
//======================== Contactus Route Start ===============================//
Route::get('/contactus/list','ContactusController@show');
Route::get('/contactus/create','ContactusController@create');
Route::get('/contactus/edit/{id}','ContactusController@edit');
Route::get('/contactus/delete/{id}','ContactusController@destroy');
Route::get('/contactus','ContactusController@index');
Route::get('/contactus/export/excel','ContactusController@ExportExcel');
Route::get('/contactus/export/pdf','ContactusController@ExportPDF');
Route::post('/contactus','ContactusController@store');
Route::post('/contactus/ajax','ContactusController@ajaxSave');
Route::post('/contactus/datatable/ajax','ContactusController@datatable');
Route::post('/contactus/update/{id}','ContactusController@update');
//======================== Contactus Route End ===============================//