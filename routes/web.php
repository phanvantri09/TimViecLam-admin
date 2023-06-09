<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SensitiveKeywordController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\MenuController;
use App\Http\controllers\BlogController;
use App\Http\Controllers\AcceptPostJobController;
use App\Http\Controllers\ListPostJobController;
use App\Http\Controllers\PostJobPackageShowController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\YearoldController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CategoryJobController;

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
            
            Route::get('/ListPostJob/{id}', 'ListPostJob')->name('ListPostJob');
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

            Route::get('/add-tab/{id}', 'AddMenuTab')->name('AddTab');
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
    Route::group(['prefix'=>'PostJob', 'as'=>'PostJob.'],function () {
        Route::controller(ListPostJobController::class)->group(function () {
            Route::get('/list', 'ListPostJob')->name('List');
        });
    });
    Route::group(['prefix'=>'AcceptPostJob', 'as'=>'AcceptPostJob.'],function () {
        Route::controller(AcceptPostJobController::class)->group(function () {
            Route::get('/accept', 'AcceptPostJob')->name('accept');
        });
    });
    //CRUD postjobpackageshow
    Route::group(['prefix'=>'PostJobPackageShow', 'as'=>'PostJobPackageShow.'],function () {
        Route::controller(PostJobPackageShowController::class)->group(function () {
            Route::get('/list', 'ListPostJobPackageShow')->name('List');

            Route::get('/add', 'AddPostJobPackageShow')->name('Add');
            Route::post('/add', 'AddPostJobPackageShowPost')->name('AddPost');

            Route::get('/delete/{id}', 'DeletePostJobPackageShow')->name('Delete');

            Route::get('/update/{id}', 'UpdatePostJobPackageShow')->name('Update');
            Route::post('/update-post/{id}', 'UpdatePostJobPackageShowPost')->name('UpdatePost');


        });
    });
    
    Route::group(['prefix'=>'Degree', 'as'=>'Degree.'],function () {
        Route::controller(DegreeController::class)->group(function () {
            Route::get('/list','ListDegree')->name('List');

            Route::get('/add', 'AddDegree')->name('Add');
            Route::post('/add', 'AddDegreePost')->name('AddPost');

            Route::get('edit/{id}','EditDegree')->name('Edit');
            Route::post('edit-post/{id}','EditDegreePost')->name('EditPost');

            Route::get('/delete/{id}', 'DeleteDegree')->name('Delete');
        });
    });
    
    Route::group(['prefix'=>'Rank', 'as'=>'Rank.'],function () {
        Route::controller(RankController::class)->group(function () {
            Route::get('/list','ListRank')->name('List');

            Route::get('/add', 'AddRank')->name('Add');
            Route::post('/add', 'AddRankPost')->name('AddPost');

            Route::get('edit/{id}','EditRank')->name('Edit');
            Route::post('edit-post/{id}','EditRankPost')->name('EditPost');

            Route::get('/delete/{id}', 'DeleteRank')->name('Delete');
        });
    });

    Route::group(['prefix'=>'Yearold', 'as'=>'Yearold.'],function () {
        Route::controller(YearoldController::class)->group(function () {
            Route::get('/list','ListYearold')->name('List');

            Route::get('/add', 'AddYearold')->name('Add');
            Route::post('/add', 'AddYearoldPost')->name('AddPost');

            Route::get('edit/{id}','EditYearold')->name('Edit');
            Route::post('edit-post/{id}','EditYearoldPost')->name('EditPost');

            Route::get('/delete/{id}', 'DeleteYearold')->name('Delete');
        });
    });

    Route::group(['prefix'=>'Experience', 'as'=>'Experience.'],function () {
        Route::controller(ExperienceController::class)->group(function () {
            Route::get('/list','ListExperience')->name('List');

            Route::get('/add', 'AddExperience')->name('Add');
            Route::post('/add', 'AddExperiencePost')->name('AddPost');

            Route::get('edit/{id}','EditExperience')->name('Edit');
            Route::post('edit-post/{id}','EditExperiencePost')->name('EditPost');

            Route::get('/delete/{id}', 'DeleteExperience')->name('Delete');
        });
    });

    Route::group(['prefix'=>'CategoryJob', 'as'=>'CategoryJob.'],function () {
        Route::controller(CategoryJobController::class)->group(function () {
            Route::get('/list','ListCategoryJob')->name('List');

            Route::get('/add', 'AddCategoryJob')->name('Add');
            Route::post('/add', 'AddCategoryJobPost')->name('AddPost');

            Route::get('edit/{id}','EditExperience')->name('Edit');
            Route::post('edit-post/{id}','EditCategoryJobPost')->name('EditPost');

            Route::get('/delete/{id}', 'DeleteCategoryJob')->name('Delete');
        });
    });

});

