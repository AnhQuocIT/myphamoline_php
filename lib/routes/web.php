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

Route::get('/', 'UserController@getHome');
Route::get('details/{id}/{slug}','UserController@getDetail');
Route::get('categories/{id}/{slug}','UserController@getCategory');
Route::get('labels/{id}/{slug}','UserController@getLabel');
Route::get('search','UserController@getSearch');
Route::get('contact','UserController@getContact');

Route::get('log-in','UserController@getUserLogin');
Route::post('log-in','UserController@postUserLogin');
Route::post('sign-in','UserController@postUserSignin');
Route::get('log-out','UserController@getUserLogout');

Route::get('user-info/{id}','UserController@getUserInfo');
Route::post('user-info/{id}','UserController@postUserInfo');

Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart');
	Route::get('show','CartController@getShowCart');
	Route::get('delete/{id}','CartController@getDeleteCart');
	Route::get('update','CartController@getUpdateCart');

	Route::get('checkout','CartController@getCheckoutCart');
	Route::post('checkout','CartController@postCheckoutCart');
});
Route::group(['namespace'=>'Admin'],function(){
	
	Route::group(['prefix'=>'admin/login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::get('admin/forgot-password','LoginController@getForgotPassword');
	Route::get('logout','HomeController@getLogout')->name('admin.logout');;
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome');
		Route::group(['prefix'=>'product-type'],function(){
			Route::get('/','CategoryController@getCategory');
			Route::post('/','CategoryController@postCategory');

			Route::get('edit/{id}','CategoryController@getEditCategory');
			Route::post('edit/{id}','CategoryController@postEditCategory');

			Route::get('delete/{id}','CategoryController@getDeleteCategory');
			Route::get('sub-menu/{id}','CategoryController@getSubCategory');
			Route::post('sub-menu/{id}','CategoryController@postSubCategory');
		});

		Route::group(['prefix'=>'product-label'],function(){
			Route::get('/','CategoryController@getLabelProduct');
			Route::post('/','CategoryController@postLabelProduct');

			Route::get('edit/{id}','CategoryController@getEditLabelProduct');
			Route::post('edit/{id}','CategoryController@postEditLabelProduct');

			Route::get('delete/{id}','CategoryController@getDeleteLabelProduct');
		});

		Route::group(['prefix'=>'slide'], function(){
			Route::get('/','SlideController@getSlide');
			Route::post('/','SlideController@postSlide');

			Route::get('edit/{id}','SlideController@getEditSlide');
			Route::post('edit/{id}','SlideController@postEditSlide');

			Route::get('delete/{id}','SlideController@getDeleteSlide');
		});

		Route::group(['prefix'=>'products'], function(){
			Route::get('/','ProductController@getProduct');
			Route::post('/','ProductController@postProduct');

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteProduct');
		});

		Route::group(['prefix'=>'member'], function(){
			Route::get('/','CustomerController@getMember');

			Route::get('edit/{id}','CustomerController@getEditMember');
			Route::post('edit/{id}','CustomerController@postEditMember');

			Route::get('delete/{id}','CustomerController@getDeleteMember');
		});

		Route::group(['prefix'=>'customer'], function(){
			Route::get('/','CustomerController@getCustomer');

			Route::get('edit/{id}','CustomerController@getEditCustomer');
			Route::post('edit/{id}','CustomerController@postEditCustomer');

			Route::get('delete/{id}','CustomerController@getDeleteCustomer');
		});

		Route::group(['prefix'=>'bill-waiting'], function(){
			Route::get('/','BillController@getWaitBill');

			Route::get('detail/{id}','BillController@getBillDetail');

			Route::get('deleteDetail/{id}','BillController@getDeleteDetail');

			Route::get('delete/{id}','BillController@getDeleteBill');

			Route::get('report/{id}','BillController@getReportPDF');
		});

		Route::group(['prefix'=>'bill-paid'], function(){
			Route::get('/','BillController@getPaidBill');

			Route::get('detail/{id}','BillController@getBillDetail');

			Route::get('delete/{id}','BillController@getDeleteBill');
		});

		Route::group(['prefix'=>'news'], function(){
			Route::get('/','NewsController@getNews');
		});

		Route::group(['prefix'=>'admin-control'], function(){
			Route::get('info','AdminController@getAdminInfo');
			
			Route::get('list','AdminController@getListAdmin');

			Route::get('register','AdminController@getAddAdmin');
			Route::post('register','AdminController@postAddAdmin');

			Route::get('edit/{id}','AdminController@getEditAdmin');
			Route::post('edit/{id}','AdminController@postEditAdmin');
		});
	});

});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// Auth::routes();
// Authentication Routes...
// $this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('admin/login', 'Auth\LoginController@login');
// $this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');
