<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SensitiveKeywordController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\MenuController;
use App\Http\controllers\BlogController;

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

Route::get('/', [App\Http\Controllers\OverviewController::class, 'OverView'])->name('home');

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

    Route::group(['prefix'=>'SensitiveKeyword', 'as'=>'SensitiveKeyword.'],function () {
        Route::controller(SensitiveKeywordController::class)->group(function () {
            Route::get('/keysensitive', 'GetKeywordSensitive')->name('KeywordSensitive');

            Route::get('/list-keysensitive', 'ListKeywordSensitive')->name('KeywordSensitive');

            // Route::get('/add-keysensitive', 'AddKeywordSensitive')->name('addKeywordSensitive');
            Route::post('/add-keysensitive', 'AddKeywordSensitive')->name('addKeywordSensitive');

            Route::get('/delete-keysensitive/{id}', 'DeleteKeywordSensitive')->name('deleteKeyword');

        });
    });
    Route::group(['prefix'=>'Overview', 'as'=>'Overview.'],function () {
        Route::controller(OverviewController::class)->group(function () {
            Route::get('/add-overview', 'OverView')->name('overview');


            Route::get('/list-user', 'ListUserOverView')->name('ListUser');

            Route::get('/list-user-recruit', 'ListUserRecruitOverView')->name('ListRecruit');

            Route::get('/list-post', 'ListPostOverView')->name('ListPost');

            Route::get('/edit-list-post/{id}', 'EditListPostOverView')->name('EditPost');


            Route::get('/list-user', 'ListUserOverView')->name('ListUser');
            Route::get('/list-user-recruit', 'ListUserRecruitOverView')->name('ListRecruit');
            // Route::get('/add-overview', 'OverView')->name('overview');

        });
    });
    Route::group(['prefix'=>'Menu', 'as'=>'Menu.'],function () {
        Route::controller(MenuController::class)->group(function () {
            Route::get('/add', 'AddMenu')->name('Add');
            Route::post('/add', 'AddMenuPost')->name('AddPost');

            Route::get('/list','ListMenu')->name('List');
            Route::get('/delete/{id}', 'Delete')->name('Delete');
            Route::post('status/{id}','Status')->name('Status');
            Route::post('status-tab/{id}','StatusTab')->name('StatusTab');

            Route::get('/add-tab', 'AddMenuTab')->name('AddTab');
            Route::post('/add-tab', 'AddMenuTabPost')->name('AddTabPost');
            Route::get('/list-tab/{id}', 'ListTab')->name('ListTab');
            Route::get('/delete-tab/{id}', 'DeleteTab')->name('DeleteTab');

            Route::get('edit/{id}','Edit')->name('Edit');
            Route::post('edit-post/{id}','EditPost')->name('EditPost');

            Route::get('edit-tab/{id}','EditTab')->name('EditTab');
            Route::post('edit-tab-post/{id}','EditTabPost')->name('EditTabPost');


        });
    });
    Route::group(['prefix'=>'Blog', 'as'=>'Blog.'],function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('/list', 'ListBlog')->name('List');

            Route::get('/add', 'AddBlog')->name('Add');
            Route::post('/add', 'AddBlogPost')->name('AddBlog');

            Route::get('/delete/{id}', 'DeleteBlog')->name('Delete');

            Route::get('/update/{id}', 'UpdateBlog')->name('Update');
            Route::post('/update-post/{id}', 'UpdateBlogPost')->name('UpdateBlogPost');


        });
    });

});

