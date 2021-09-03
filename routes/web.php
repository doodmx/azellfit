<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/locale/{locale}', 'WebSiteController@changeLocale')->name('web.changeLocale');

Route::get('/', 'WebSiteController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/investment', 'WebSiteController@investment')->name('investment');
Route::post('/leads', 'WebSiteController@sendLead')->name('lead');
Route::get('/terms', 'WebSiteController@terms')->name('terms');
Route::get('/privacy-policies', 'WebSiteController@policies')->name('policies');
Route::post('/contact/sendSimulatorMail', 'WebSiteController@sendContactSimulatorMail')->name('contact.simulatorMail');
Route::post('/contact/sendScheduleMail', 'WebSiteController@sendContactScheduleMail')->name('contact.scheduleMail');
Route::get('/blog', 'Blog\BlogWebController@index')->name('web.blog.index');
Route::get('/blog/{slug}', 'Blog\BlogWebController@show')->name('web.blog.show');


Route::middleware(['auth'])->group(function () {


    /*----- AUTHENTICATED WEB ROUTES ----- */

    Route::get('/courses', 'Course\CourseWebController@all')->name('web.courses.all');
    Route::get('/courses/{slug}/detail', 'Course\CourseWebController@show')->name('web.courses.show');

    Route::prefix('enrolls')->group(function () {

        Route::get('/', 'Partner\EnrollController@showLearningCourses')->name('web.enrolls');
        Route::prefix('/{id}')->group(function () {
            Route::get('/map', 'Partner\EnrollController@map')->name('web.enrolls.course.map');
            Route::get('/', 'Partner\EnrollController@showLearningCourse')->name('web.enrolls.course');
            Route::get('/quiz', 'Partner\EnrollController@showQuiz')->name('web.enrolls.quiz');
            Route::put('/free', 'Partner\EnrollController@addFreePartner')->name('web.enrolls.free');
            Route::post('/review', 'Partner\EnrollController@postReview')->name('web.enrolls.review.store');
            Route::post('/quiz', 'Partner\EnrollController@postQuiz')->name('web.enrolls.quiz.store');


            Route::prefix('/chapters/{chapter_id}')->group(function () {
                Route::put('/', 'Partner\EnrollController@setChapterAsDone')->name('web.enrolls.chapters.done');
                Route::delete('/', 'Partner\EnrollController@setChapterAsPendant')->name('web.enrolls.chapters.pendant');
            });
        });


    });


    /*------ CART MODULE ----- */
    Route::prefix('cart')->group(function () {

        Route::get('/', 'Payment\CartController@show')->name('cart.list');
        Route::post('/purchase', 'Payment\CartController@purchase')->name('cart.purchase');
        Route::delete('/', 'Payment\CartController@empty')->name('cart.empty');

        Route::post('/items', 'Payment\CartController@addItem')->name('cart.addItem');
        Route::delete('/items/{cart_item}', 'Payment\CartController@deleteItem')->name('cart.deleteItem');


    });

    /*------ PAYMENTS MODULE ------*/
    Route::prefix('payments')->group(function () {

        Route::get('/', ['middleware' => ['can:view_payments'], 'uses' => 'Payment\PaymentController@index'])->name('payments.index');
        Route::post('/intent', 'Payment\PaymentController@makeIntent')->name('payments.intent');
        Route::post('/charge', 'Payment\PaymentController@charge')->name('payments.charge');
        Route::post('{id}/send', 'Payment\PaymentController@send')->name('payments.send');


    });


    /*------ PARTNER MODULE -----*/
    Route::prefix('partner')->group(function () {
        Route::prefix('investments')->group(function () {
            Route::get('', 'Partner\InvestmentController@index')->name('investments.index');
            Route::get('create', 'Partner\InvestmentController@create')->name('investments.create');
            Route::delete('/{id}', ['uses' => 'User\UserController@delete'])->name('investments.delete');

        });
        Route::get('/{id}', ['uses' => 'User\UserController@showProfile'])->name('users.web.profile');

    });


    /* ----- ADMIN PANEL ROUTES -----*/
    Route::prefix('admin')->group(function () {


        Route::prefix('categories')->group(function () {
            Route::get('', ['middleware' => ['can:view_categories'], 'uses' => 'Blog\CategoryController@index'])->name('categories.index');
            Route::get('/{id}', ['middleware' => ['can:view_categories'], 'uses' => 'Blog\CategoryController@show'])->name('categories.show');
            Route::post('', ['middleware' => ['can:create_category'], 'uses' => 'Blog\CategoryController@store'])->name('categories.store');
            Route::patch('/{id}', ['middleware' => ['can:edit_category'], 'uses' => 'Blog\CategoryController@update'])->name('categories.update');
            Route::put('/{id}/restore', ['middleware' => ['can:delete_category'], 'uses' => 'Blog\CategoryController@restore'])->name('tags.restore');
            Route::delete('/{id}', ['middleware' => ['can:delete_category'], 'uses' => 'Blog\CategoryController@delete'])->name('tags.delete');
        });

        Route::prefix('tags')->group(function () {
            Route::get('', ['middleware' => ['can:view_tags'], 'uses' => 'Blog\TagController@index'])->name('tags.index');
            Route::get('/{id}', ['middleware' => ['can:view_tags'], 'uses' => 'Blog\TagController@show'])->name('tags.show');
            Route::post('', ['middleware' => ['can:create_tag'], 'uses' => 'Blog\TagController@store'])->name('tags.store');
            Route::patch('/{id}', ['middleware' => ['can:edit_tag'], 'uses' => 'Blog\TagController@update'])->name('tags.update');
            Route::put('/{id}/restore', ['middleware' => ['can:delete_tag'], 'uses' => 'Blog\TagController@restore'])->name('tags.restore');
            Route::delete('/{id}', ['middleware' => ['can:delete_tag'], 'uses' => 'Blog\TagController@delete'])->name('tags.delete');
        });

        Route::prefix('blogs')->group(function () {
            Route::get('', ['middleware' => ['can:view_blogs'], 'uses' => 'Blog\BlogController@index'])->name('blogs.index');
            Route::get('/create', ['middleware' => ['can:create_blog'], 'uses' => 'Blog\BlogController@create'])->name('blogs.create');
            Route::get('/{id}/edit', ['middleware' => ['can:edit_blog'], 'uses' => 'Blog\BlogController@edit'])->name('blogs.edit');
            Route::post('', ['middleware' => ['can:create_blog'], 'uses' => 'Blog\BlogController@store'])->name('blogs.store');
            Route::post('/{id}', ['middleware' => ['can:edit_blog'], 'uses' => 'Blog\BlogController@update'])->name('blogs.update');
            Route::post('/deleteImage/{id}/{type}', ['middleware' => ['can:edit_blog'], 'uses' => 'Blog\BlogController@deleteImage'])->name('blogs.deleteImage');
        });


        /*----- PAYMENTS -----*/
        Route::prefix('payments')->group(function () {

            Route::get('/', ['middleware' => ['can:view_payments'], 'uses' => 'Payment\PaymentController@index'])->name('payments.index');
            Route::post('{id}/send', 'Payment\PaymentController@send')->name('payments.send');


        });

        /*----- COURSE TYPES -----*/
        Route::prefix('course_types')->group(function () {

            Route::get('', ['middleware' => ['can:view_course_categories'], 'uses' => 'Course\CourseTypeController@index'])->name('course_types.index');
            Route::get('/create', ['middleware' => ['can:create_course_category'], 'uses' => 'Course\CourseTypeController@create'])->name('course_types.create');

            Route::post('/', ['middleware' => ['can:create_course_category'], 'uses' => 'Course\CourseTypeController@store'])->name('course_types.store');
            Route::get('/{id}/edit', ['middleware' => ['can:edit_course_category'], 'uses' => 'Course\CourseTypeController@edit'])->name('course_types.edit');
            Route::patch('/{id}', ['middleware' => ['can:edit_course_category'], 'uses' => 'Course\CourseTypeController@update'])->name('course_types.update');
            Route::put('/{id}/restore', ['middleware' => ['can:delete_course_category'], 'uses' => 'Course\CourseTypeController@restore'])->name('course_types.restore');
            Route::delete('/{id}', ['middleware' => ['can:delete_course_category'], 'uses' => 'Course\CourseTypeController@delete'])->name('course_types.delete');
        });


        /*-----COURSES-----*/
        Route::prefix('courses')->group(function () {


            Route::get('', ['middleware' => ['can:view_courses'], 'uses' => 'Course\CourseController@index'])->name('courses.index');
            Route::get('/create', ['middleware' => ['can:create_course'], 'uses' => 'Course\CourseController@create'])->name('courses.create');
            Route::post('/', ['middleware' => ['can:create_course'], 'uses' => 'Course\CourseController@store'])->name('courses.store');
            Route::get('/{id}/edit', ['middleware' => ['can:edit_course'], 'uses' => 'Course\CourseController@edit'])->name('courses.edit');
            Route::patch('/{id}', ['middleware' => ['can:edit_course'], 'uses' => 'Course\CourseController@update'])->name('courses.update');
            Route::put('/{id}/restore', ['middleware' => ['can:delete_course'], 'uses' => 'Course\CourseController@restore'])->name('courses.restore');
            Route::delete('/{id}', ['middleware' => ['can:delete_course'], 'uses' => 'Course\CourseController@delete'])->name('courses.delete');


            /*----- CHAPTERS -----*/
            Route::prefix('/{course_id}/chapters')->group(function () {

                Route::get('/', ['middleware' => ['can:view_chapters'], 'uses' => 'Course\ChapterController@index'])->name('chapters.index');
                Route::post('/', ['middleware' => ['can:create_chapter'], 'uses' => 'Course\ChapterController@store'])->name('chapters.store');
                Route::get('/{id}', ['middleware' => ['can:edit_chapter'], 'uses' => 'Course\ChapterController@show'])->name('chapters.show');
                Route::patch('/{id}', ['middleware' => ['can:edit_chapter'], 'uses' => 'Course\ChapterController@update'])->name('chapters.update');
                Route::delete('/{id}', ['middleware' => ['can:delete_chapter'], 'uses' => 'Course\ChapterController@delete'])->name('chapters.delete');

                /*----- QUIZ -----*/
                Route::prefix('/{chapter_id}/quiz')->group(function () {

                    Route::get('/create', ['middleware' => ['can:create_course_quiz'], 'uses' => 'Quiz\QuizController@create'])->name('quiz.create');
                    Route::get('/', ['middleware' => ['can:edit_course_quiz'], 'uses' => 'Quiz\QuizController@show'])->name('quiz.show');
                    Route::post('/', ['middleware' => ['can:create_course_quiz'], 'uses' => 'Quiz\QuizController@store'])->name('quiz.store');
                    Route::patch('/', ['middleware' => ['can:edit_course_quiz'], 'uses' => 'Quiz\QuizController@update'])->name('quiz.update');

                    /*----- QUESTIONS ----- */
                    Route::prefix('/questions/{question_id}')->group(function () {
                        Route::delete('/', ['middleware' => ['can:edit_course_quiz'], 'uses' => 'Quiz\QuizQuestionController@delete'])->name('question.delete');


                        /*----- OPTIONS -----*/
                        Route::prefix('/options')->group(function () {
                            Route::delete('/{option_id}', ['middleware' => ['can:edit_course_quiz'], 'uses' => 'Quiz\QuestionOptionController@delete'])->name('option.delete');

                        });
                    });

                });
            });
        });

        /*-----USERS-----*/
        Route::prefix('users')->group(function () {
            Route::get('/', ['middleware' => ['can:view_users'], 'uses' => 'User\UserController@index'])->name('users.index');
            Route::get('/{id}', ['uses' => 'User\UserController@showProfile'])->name('users.profile');
            Route::get('/{id}/credentials', ['uses' => 'User\UserController@getResetCredentials'])->name('users.getReset');
            Route::patch('/{id}', ['uses' => 'User\UserController@updateProfile'])->name('users.update');
            Route::post('/{id}/verifyAccount', ['middleware' => ['can:verify_account'], 'uses' => 'User\UserController@verifyAccount'])->name('users.verify');
            Route::patch('/{id}/credentials', ['uses' => 'User\UserController@resetCredentials'])->name('users.reset');
            Route::patch('/{id}/role', ['middleware' => ['can:change_role_user'], 'uses' => 'User\UserController@changeRole'])->name('users.role');
            Route::delete('/{id}', ['middleware' => ['can:delete_users'], 'uses' => 'User\UserController@delete'])->name('users.delete');

        });

        /*----- ROLES -----*/
        Route::prefix('roles')->group(function () {
            Route::get('/', ['middleware' => ['can:view_roles'], 'uses' => 'User\RoleController@index'])->name('roles.index');
            Route::get('/create', ['middleware' => ['can:create_role'], 'uses' => 'User\RoleController@create'])->name('roles.create');
            Route::get('/{id}', ['middleware' => ['can:edit_role'], 'uses' => 'User\RoleController@show'])->name('roles.edit');
            Route::post('/', ['middleware' => ['can:create_role'], 'uses' => 'User\RoleController@store'])->name('roles.store');
            Route::patch('/{id}', ['middleware' => ['can:edit_role'], 'uses' => 'User\RoleController@update'])->name('roles.update');
            Route::put('/{id}/restore', ['middleware' => ['can:delete_role'], 'uses' => 'User\RoleController@restore'])->name('roles.restore');
            Route::delete('/{id}', ['middleware' => ['can:delete_role'], 'uses' => 'User\RoleController@delete'])->name('roles.delete');

        });

    });

});

