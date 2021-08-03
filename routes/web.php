<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\emp\EmpLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\role\RoleController;
use Illuminate\Support\Facades\Auth;
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



// Route::get('/',function(){
//     return view('welcome');
// });

//user
Route::prefix('user')->name('user.')->group(function(){

    Auth::routes();
    Route::group(['middleware'=>'auth'],function(){

            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/view',[IndexController::class,'view'])->name('view')->middleware('permission:view');
            Route::get('/insert',[IndexController::class,'insert'])->name('insert')->middleware('permission:insert');
            Route::post('/insert-data',[IndexController::class,'insertData'])->name('insert-data')->middleware('permission:insert');
            Route::get('/delete',[IndexController::class,'delete'])->name('delete')->middleware('permission:delete');
            Route::get('/edit',[IndexController::class,'edit'])->name('edit')->middleware('permission:edit');
            Route::post('/update-data',[IndexController::class,'updateData'])->name('update-data')->middleware('permission:update');
            Route::post('/check-email',[IndexController::class,'checkEmail'])->name('check-email')->middleware('permission:emailsend');
            Route::get('/delete-all',[IndexController::class,'deleteAll'])->name('delete-all')->middleware('permission:deleteall');
            Route::get('/country',[IndexController::class,'country'])->name('country');
            Route::get('/state',[IndexController::class,'state'])->name('state');
            Route::get('/email-send',[IndexController::class,'emailSend'])->name('email-send')->middleware('permission:emailsend');

            //role

            Route::get('/role',[RoleController::class,'role'])->name('role')->middleware('permission:role_module');
            Route::post('/role-add',[RoleController::class,'roleAdd'])->name('role-add')->middleware('permission:emailsend');
            Route::get('/role-delete/{id?}',[RoleController::class,'roleDelete'])->name('role-delete')->middleware('permission:role_delete');
            Route::get('/role-edit/{id}',[RoleController::class,'roleEdit'])->name('role-edit')->middleware('permission:role_edit');
            Route::post('/role-update',[RoleController::class,'roleUpdate'])->name('role-update')->middleware('permission:role_edit');
            Route::get('/role-view/{id}',[RoleController::class,'roleView'])->name('role-view')->middleware('permission:role_view');
            Route::get('/userRegistration',[RoleController::class,'userRegistration'])->name('user-registration')->middleware('permission:user-registration');
            Route::get('/edit-permission/{id}',[RoleController::class,'editPermission'])->name('edit-permission')->middleware('permission:permission_edit');
            Route::post('/update-permission',[RoleController::class,'updatePermission'])->name('update-permission')->middleware('permission:permission_edit');

            //permission
            Route::get('/permission',[RoleController::class,'permission'])->name('permission')->middleware('permission:permission_module');
            Route::post('/permission-add',[RoleController::class,'permissionAdd'])->name('permission-add')->middleware('permission:permission_module');
            Route::get('/permission-delete/{id?}',[RoleController::class,'permissionDelete'])->name('permission-delete')->middleware('permission:permission_delete');
            Route::get('/permission-edit',[RoleController::class,'permissionEdit'])->name('permission-edit')->middleware('permission:permission_edit');
            Route::post('/permission-update',[RoleController::class,'permissionUpdate'])->name('permission-update')->middleware('permission:permission_edit');


            Route::get('/userRegisterShow/{id}',[RoleController::class,'userRegisterShow'])->name('user-registration-show')->middleware('permission:user-registration-show');

            //Repositery

            Route::resource('/repo', RepositoryController::class);
        });
    });
//admin
Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/login',[AdminLoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[AdminLoginController::class,'login'])->name('loginattempt');
    Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');

    Route::group(['middleware'=>'auth:admin'],function(){

        Route::view('/home','admin.home')->name('home');

    });
});

//Emp
Route::prefix('emp')->name('emp.')->group(function(){

    Route::get('/login',[EmpLoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[EmpLoginController::class,'login'])->name('loginemp');
    Route::post('/logout',[EmpLoginController::class,'logout'])->name('logout');

    Route::group(['middleware'=>'auth:emp'],function(){

        Route::view('/home','emp.home')->name('home');

    });
});
