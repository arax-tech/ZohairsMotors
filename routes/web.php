<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () { return redirect('/home'); });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
//    Artisan::call('optimize');
    die("Cash Cleard");
});



/*Website Routes*/
Route::group(['namespace' => 'Front'],function(){
	Route::get('/home','IndexController@index');
	Route::get('/search','IndexController@search');
	Route::get('/shop/','IndexController@shop');
	Route::get('/category/{url}','CategoryController@index');
	Route::get('/product/details/{id}','IndexController@product');
	/*Check Pin Code*/
	Route::get('/check-postal-code', 'IndexController@check_postal_code');

	Route::get('/get-product-prize','IndexController@getProductPrize');
	Route::get('/getProductColor','IndexController@getProductColor');
	
	/*Cart Routes*/
	Route::post('/add-to-cart','CartController@add_to_cart');
	Route::get('/cart','CartController@cart');
	Route::get('/cart/delete/{id}','CartController@delete');
	Route::get('/cart/update/{id}/{qty}','CartController@update');
	Route::post('/cart/apply-coupon', 'CartController@apply_coupon');

	/*Colors Filters*/
	Route::post('/filter/', 'FilterController@filters');

	/*Contact US*/
	Route::get('/pages/contact', 'ContactController@index');
	Route::post('/pages/contact', 'ContactController@contact');


	/*Pages Routes*/
	Route::get('pages/{url}', 'PagesController@index');

});




/*User Logn / Register*/
Route::group(['namespace' => 'User'], function(){
	Route::get('login-register','UserController@login_register');
	Route::post('login-register/store','UserController@store');
	Route::get('check-email','UserController@check_email');
	Route::post('user-login','UserController@login');
	Route::get('user-logout','UserController@logout');
});


/*User Accounts*/
Route::group(['namespace' => 'User', 'middleware' => ['Auth' => 'CheckUser']], function(){
	Route::get('account','AccountController@account');
	Route::post('account/update-password','AccountController@update_password');
	Route::get('check-user-pwd','AccountController@check_pwd');
	Route::post('account/update-info/{id}','AccountController@update_info');
	Route::get('checkout','CheckoutController@checkout');
	Route::post('checkout/place-order','CheckoutController@place_order');
	Route::get('thanks','CheckoutController@thanks');
	Route::get('paypal','OrderController@paypal');
	Route::get('user-order','OrderController@user_orders');
	Route::get('/order/delete/{id}','OrderController@delete');

	/*Orders Details*/
	Route::get('/order/details/{id}', 'OrderController@order_details');
});






/*Admin Login*/
Route::group(['prefix' => 'admin' ,'namespace' => 'Admin'], function(){
	Route::match(['get','post'],'/login','AdminController@login');
});

/*Admin Dashboard Routes*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['Auth' => 'CheckAdmin']], function(){
	Route::get('dashboard','AdminController@dashboard');
	Route::get('profile','AdminController@profile');
	Route::post('profile/update_profile/{id}','AdminController@update_profile');
	Route::get('change-password','AdminController@change_password');
	Route::match(['put','get','post'],'/profile/update/{id}', 'AdminController@update');
	Route::post('update-password','AdminController@update_password');
	Route::get('check','AdminController@check');
	Route::get('logout','AdminController@logout');


	/*Category CRUD Operation*/
	Route::get('category', 'CategoryController@index');
	Route::get('category/create', 'CategoryController@create');
	Route::post('category/store', 'CategoryController@store');
	Route::get('category/edit/{id}', 'CategoryController@edit');
	Route::post('category/update/{id}', 'CategoryController@update');
	Route::get('category/delete/{id}', 'CategoryController@delete');

	/*Products CRUD Operation*/
	Route::get('product', 'ProductController@index');
	Route::get('product/create', 'ProductController@create');
	Route::post('product/store', 'ProductController@store');
	Route::get('product/edit/{id}', 'ProductController@edit');
	Route::get('product/delete/{id}', 'ProductController@delete');
	Route::post('product/update/{id}', 'ProductController@update');
	
	/*Products Atributes CRUD Operation*/
	Route::get('product/attributes/{id}', 'ProductController@product_attributes');
	Route::post('product/attributes/store/{id}', 'ProductController@product_attributes_store');
	Route::get('attributes', 'ProductController@attributes');
	Route::get('attributes/delete/{id}', 'ProductController@delete_attributes');



	/*Cuopon CRUD Operation*/
	Route::get('coupon','CouponController@index');
	Route::get('coupon/create','CouponController@create');
	Route::post('coupon/store','CouponController@store');
	Route::get('coupon/edit/{id}','CouponController@edit');
	Route::post('coupon/update/{id}','CouponController@update');
	Route::get('coupon/delete/{id}','CouponController@delete');


	/*Order Operations*/
	Route::get('/orders', 'OrderController@index');
	Route::get('/orders-details/{id}', 'OrderController@order_details');
	Route::get('/orders/edit/{id}', 'OrderController@edit');
	Route::post('/orders/update/{id}', 'OrderController@update');
	Route::get('/orders/invoice/{id}', 'OrderController@invoice');

	/*Slider CRUD operation*/
	Route::get('slider','SliderController@index');
	Route::get('slider/create','SliderController@create');
	Route::post('slider/store','SliderController@store');
	Route::get('slider/edit/{id}','SliderController@edit');
	Route::post('slider/update/{id}','SliderController@update');
	Route::get('slider/delete/{id}','SliderController@delete');


	/*Users Operations*/
	Route::get('/users', 'UserController@index');
	Route::get('/user/delete/{id}', 'UserController@delete');


	/*Pages Operations*/
	Route::get('/pages', 'PagesController@index');
	Route::get('/pages/create', 'PagesController@create');
	Route::post('/pages/store', 'PagesController@store');
	Route::get('/pages/edit/{id}', 'PagesController@edit');
	Route::post('/pages/update/{id}', 'PagesController@update');
	Route::get('/pages/delete/{id}', 'PagesController@delete');

});
