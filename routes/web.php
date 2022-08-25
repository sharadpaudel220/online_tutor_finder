<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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
    return view('frontend.index');
});

Route::group(['middleware' => 'auth','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
    Route::resource('jobs', \App\Http\Controllers\Admin\JobController::class);
    Route::post('jobs/media', [\App\Http\Controllers\Admin\JobController::class, 'storeMedia'])->name('jobs.storeMedia');
    Route::get('jobs/mediashow/{mediaItem}', [\App\Http\Controllers\Admin\JobController::class, 'downloadMedia'])->name('jobs.downloadMedia');
    Route::resource('proposals', \App\Http\Controllers\Admin\ProposalController::class);
    Route::post('proposals/media', [\App\Http\Controllers\Admin\ProposalController::class, 'storeMedia'])->name('proposals.storeMedia');
    Route::get('proposals/mediashow/{mediaItem}', [\App\Http\Controllers\Admin\JobController::class, 'downloadMedia'])->name('proposals.downloadMedia');
    Route::post('rateuser/{id}',[\App\Http\Controllers\Admin\RatingController::class,'rateuser'])->name('rateuser');
    Route::put('updateuser/{id}',[\App\Http\Controllers\Admin\RatingController::class,'updaterating'])->name('updaterating');




    // resource controllers 
    Route::resource('userprofile', \App\Http\Controllers\ProfileController::class);

});
Route::view('/about','frontend.about');
Route::view('/contact', 'frontend.contact');
Route::get('searchteacher',[\App\Http\Controllers\Admin\UserController::class,'search'])->name('search');
Route::post('searchbycategory',[\App\Http\Controllers\Admin\UserController::class,'searchbycategory'])->name('searchbycategory');
Route::get('searchteacher1',[\App\Http\Controllers\Admin\UserController::class,'search'])->name('searchlist');
Route::post('teacherprofile/{id}',[\App\Http\Controllers\Admin\UserController::class,'teacherprofile'])->name('teacherprofile');
Route::get('teacherprofile/{id}',[\App\Http\Controllers\Admin\UserController::class,'teacherprofile'])->name('teacherprofile');

Auth::routes();

