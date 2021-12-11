<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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
    if(!session()->has('user')) {
        return view('userSignIn');
    } else {
        $userOrders = app('App\Http\Controllers\UserController')->getUserOrders();
        return view('userProfile', ['userOrders' => $userOrders]);
    }
});

Route::post('login', [UserController::class, 'getUserLogin']);

Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
        session()->pull('userId');
        session()->pull('email');
        session()->pull('phone');
        session()->pull('address');
        session()->pull('billingInfo');   
    }
    return view('userSignIn');
});

Route::get('/book', [BookController::class, 'getBooks']);

// Route::get('/user', [UserController::class, 'getUsers']);

Route::get('/userRegister', function () {
    return view('userRegister');
});

Route::get('/BookList', function () {
    if(!session()->has('user')) {
        return view('userSignIn');
    } else {
        $bookListArr = app('App\Http\Controllers\BookController')->getBooks();
        return view('bookList', ['bookList' => $bookListArr]);
    }
});

Route::get('/adminLogin', function () {
    return view('adminSignIn');
});

Route::get('/viewReport', function () {
    if(!session()->has('user')) {
        return view('userSignIn');
    } else {
        return view('viewReport');
    }
});

Route::get('/userProfile', function () {
    $userOrders = app('App\Http\Controllers\UserController')->getUserOrders();
    return view('userProfile', ['userOrders' => $userOrders]);
});

Route::get('/filterBooks/{params}', function ($params) {
    $array = explode("&", $params);
    $key = explode("=", $array[0])[1];
    $value = explode("=", $array[1])[1];
    $bookListArr=App::call('App\Http\Controllers\BookController@filterBooks' , ['key' => $key, 'value' => $value]);
    return view('bookList', ['bookList' => $bookListArr]);
});

Route::get('/userProfile/{params}', function ($params) {
    $array = explode("=", $params);
    $value =$array[1];
    $userProfile=App::call('App\Http\Controllers\UserController@getUser' , ['value' => $value]);
    return view('userProfile', ['user' => $userProfile]);
});

Route::post('/userRegister', 'App\Http\Controllers\UserController@addOne');

Route::get('/checkAdminLogin', 'App\Http\Controllers\AdminController@getAdminLogin');

Route::get('/adminLogout', function () {
    return view('welcome');
});

Route::post('/bookManage', 'App\Http\Controllers\BookController@bookManage');

Route::get('/report', 'App\Http\Controllers\ReportController@getReport');

Route::get('/viewReport',"App\Http\Controllers\ReportController@displayReport")->name('viewReport');

Route::post('/addOrder', 'App\Http\Controllers\OrderController@addOrder');