<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SlideController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::group(['prefix'=>'Job', 'as'=>'Job.'],function () {
        Route::controller(JobController::class)->group(function () {
            Route::get('/show/{id}', 'Show')->name('Show');
            Route::get('/list', 'List')->name('List');
            // Route::get('/list/{id}', 'List')->name('List');
            Route::get('/add', 'Add')->name('Add');
            Route::post('/add-post', 'AddPost')->name('AddPost');
    
            Route::get('/edit/{id}', 'Edit')->name('Edit');
            Route::post('/edit-post', 'EditPost')->name('EditPost');

            Route::get('/delete/{id}', 'Delete')->name('Delete');
            Route::get('/satus', 'Status')->name('Status');
        });
    });
    Route::group(['prefix'=>'User', 'as'=>'User.'],function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('list/{type}', 'List')->name('List');
            Route::get('/show/{id}', 'Show');
            Route::get('/add/{type}', 'Add')->name('Add');
            Route::post('/add-post', 'AddPost')->name('AddPost');
    
            Route::get('/edit/{id}', 'Edit')->name('Edit');
            Route::post('/edit-post', 'EditPost')->name('EditPost');

            Route::get('/delete/{id}', 'Delete')->name('Delete');

            Route::get('/apply/{id}', 'Apply')->name('Apply');
            
            Route::get('/job/{id}', 'Job')->name('Job');

        });
    });
    Route::group(['prefix' => 'Slide', 'as' => 'Slide.'],function () {
        Route::controller(SlideController::class)->group(function () {
            Route::get('/add','AddSlide')->name('Add');
            Route::post('/add','AddSlidePost')->name('AddPost');
            Route::get('/list','ListSlide')->name('List');
            Route::get('/delete/{id}', 'Delete')->name('Delete');

            
            
            Route::get('/add-image/{id}', 'AddImage')->name('AddImage');
            Route::post('/add-image', 'AddImagePost')->name('AddImagePost');

            Route::get('/detail/{id}', 'SlideDetail')->name('Detail');

            Route::get('/image/{id}', 'Image')->name('Image');
            Route::get('/delete-image/{id}', 'DeleteImage')->name('DeleteImage');

            Route::post('status/{id}','Status')->name('Status');
            Route::post('status-image/{id}','StatusImage')->name('StatusImage');

            Route::get('edit/{id}','Edit')->name('Edit');
            Route::post('edit-post/{id}','EditPost')->name('EditPost');

            Route::get('edit-image/{id}','EditImage')->name('EditImage');
            Route::post('edit-image-post/{id}','EditImagePost')->name('EditImagePost');


            
        });
    });
});

