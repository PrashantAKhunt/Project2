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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']],function(){
    Route::post('/viewstudent','App\Http\Controllers\StudentController@viewStudent')->name('viewstudent');
});

//for students
Route::group(['middleware' => ['auth','role:student']],function(){
    Route::get('/dashboard/myprofile','App\Http\Controllers\StudentController@studentprofile')->name('studentProfile');
});


//for admin
Route::group(['middleware' => ['auth','role:admin']],function(){
    Route::get('/admin/addtrainer','App\Http\Controllers\AdminController@addtrainer')->name('employee.admin.addtrainer');
    Route::post('/admin/addtrainer','App\Http\Controllers\AdminController@storetrainer')->name('trainer.admin.register');

    Route::get('/admin/addcounsellor','App\Http\Controllers\AdminController@addcounsellor')->name('employee.admin.addcounsellor');
    Route::post('/admin/addcounsellor','App\Http\Controllers\AdminController@storecounsellor')->name('counsellor.admin.register');

    Route::get('/admin/addreceptionist','App\Http\Controllers\AdminController@addreceptionist')->name('employee.admin.addreceptionist');
    Route::post('/admin/addreceptionist','App\Http\Controllers\AdminController@storereceptionist')->name('receptionist.admin.register');

    Route::get('/admin/addmobiliser','App\Http\Controllers\AdminController@addmobiliser')->name('employee.admin.addmobiliser');
    Route::post('/admin/addmobiliser','App\Http\Controllers\AdminController@storemobiliser')->name('mobiliser.admin.register');

    Route::get('/admin/addpeon','App\Http\Controllers\AdminController@addpeon')->name('employee.admin.addpeon');
    Route::post('/admin/addpeon','App\Http\Controllers\AdminController@storepeon')->name('peon.admin.register');

    Route::get('/admin/addbranch','App\Http\Controllers\AdminController@addbranch')->name('employee.admin.addbranch');
    Route::post('/admin/addbranch','App\Http\Controllers\AdminController@storebranch')->name('branch.admin.register');

    Route::get('/admin/addmanager','App\Http\Controllers\AdminController@addmanager')->name('employee.admin.addmanager');
    Route::post('/admin/addmanager','App\Http\Controllers\AdminController@storemanager')->name('manager.admin.register');

    Route::get('/admin/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.admin.addstudent');
    Route::post('/admin/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.admin.register');

    Route::post('/admin/viewbranch','App\Http\Controllers\BranchController@viewBranchDetails')->name('admin.viewbranch');

});



//For Manager
Route::group(['middleware' => ['auth','role:manager']],function(){
    Route::get('/manager/addtrainer','App\Http\Controllers\AdminController@addtrainer')->name('employee.manager.addtrainer');
    Route::post('/manager/addtrainer','App\Http\Controllers\AdminController@storetrainer')->name('trainer.manager.register');

    Route::get('/manager/addcounsellor','App\Http\Controllers\AdminController@addcounsellor')->name('employee.manager.addcounsellor');
    Route::post('/manager/addcounsellor','App\Http\Controllers\AdminController@storecounsellor')->name('counsellor.manager.register');

    Route::get('/manager/addreceptionist','App\Http\Controllers\AdminController@addreceptionist')->name('employee.manager.addreceptionist');
    Route::post('/manager/addreceptionist','App\Http\Controllers\AdminController@storereceptionist')->name('receptionist.manager.register');

    Route::get('/manager/addmobiliser','App\Http\Controllers\AdminController@addmobiliser')->name('employee.manager.addmobiliser');
    Route::post('/manager/addmobiliser','App\Http\Controllers\AdminController@storemobiliser')->name('mobiliser.manager.register');

    Route::get('/manager/addpeon','App\Http\Controllers\AdminController@addpeon')->name('employee.manager.addpeon');
    Route::post('/manager/addpeon','App\Http\Controllers\AdminController@storepeon')->name('peon.manager.register');

    Route::get('/manager/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.manager.addstudent');
    Route::post('/manager/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.manager.register');

});


//For Branch
Route::group(['middleware' => ['auth','role:branch']],function(){
    Route::get('/branch/addtrainer','App\Http\Controllers\AdminController@addtrainer')->name('employee.branch.addtrainer');
    Route::post('/branch/addtrainer','App\Http\Controllers\AdminController@storetrainer')->name('trainer.branch.register');

    Route::get('/branch/addcounsellor','App\Http\Controllers\AdminController@addcounsellor')->name('employee.branch.addcounsellor');
    Route::post('/branch/addcounsellor','App\Http\Controllers\AdminController@storecounsellor')->name('counsellor.branch.register');

    Route::get('/branch/addreceptionist','App\Http\Controllers\AdminController@addreceptionist')->name('employee.branch.addreceptionist');
    Route::post('/branch/addreceptionist','App\Http\Controllers\AdminController@storereceptionist')->name('receptionist.branch.register');

    Route::get('/branch/addmobiliser','App\Http\Controllers\AdminController@addmobiliser')->name('employee.branch.addmobiliser');
    Route::post('/branch/addmobiliser','App\Http\Controllers\AdminController@storemobiliser')->name('mobiliser.branch.register');

    Route::get('/branch/addpeon','App\Http\Controllers\AdminController@addpeon')->name('employee.branch.addpeon');
    Route::post('/branch/addpeon','App\Http\Controllers\AdminController@storepeon')->name('peon.branch.register');

    Route::get('/branch/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.branch.addstudent');
    Route::post('/branch/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.branch.register');


});

//For Employee
Route::group(['middleware' => ['auth','role:employee']],function(){
    
    Route::get('/employee/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.employee.addstudent');
    Route::post('/employee/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.employee.register');

});

Route::group(['middleware' => ['auth']],function(){
    
    Route::post('/export/manager','App\Http\Controllers\BranchController@exportManager')->name("export.manager");
    Route::post('/export/trainer','App\Http\Controllers\BranchController@exportTrainer')->name("export.trainer");
    Route::post('/export/counsellor','App\Http\Controllers\BranchController@exportCounsellor')->name("export.counsellor");
    Route::post('/export/receptionist','App\Http\Controllers\BranchController@exportReceptionst')->name("export.receptionist");
    Route::post('/export/mobiliser','App\Http\Controllers\BranchController@exportMobiliser')->name("export.mobiliser");
    Route::post('/export/peon','App\Http\Controllers\BranchController@exportPeon')->name("export.peon");
    Route::post('/export/student','App\Http\Controllers\BranchController@exportStudent')->name("export.student");
    

    

});


require __DIR__.'/auth.php';
