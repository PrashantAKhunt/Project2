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

Route::get('/','App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('loginF');
// Route::get('/', function () {
//     return view('welcome');
// });

// App\Http\Controllers\Auth\AuthenticatedSessionController@create

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
    
    Route::get('/admin/editTrainer/{id}','App\Http\Controllers\UpdateController@editTrainer');
    Route::get('/admin/deleteTrainer/{id}','App\Http\Controllers\UpdateController@deleteTrainer');
    Route::post('/admin/editTrainer/','App\Http\Controllers\UpdateController@updateTrainer');
    Route::get('/admin/addtrainer','App\Http\Controllers\AdminController@addtrainer')->name('employee.admin.addtrainer');
    Route::post('/admin/addtrainer','App\Http\Controllers\AdminController@storetrainer')->name('trainer.admin.register');

    Route::get('/admin/editCounsellor/{id}','App\Http\Controllers\UpdateController@editCounsellor');
    Route::get('/admin/deleteCounsellor/{id}','App\Http\Controllers\UpdateController@deleteCounsellor');
    Route::post('/admin/editCounsellor/','App\Http\Controllers\UpdateController@updateCounsellor');
    Route::get('/admin/addcounsellor','App\Http\Controllers\AdminController@addcounsellor')->name('employee.admin.addcounsellor');
    Route::post('/admin/addcounsellor','App\Http\Controllers\AdminController@storecounsellor')->name('counsellor.admin.register');

    Route::get('/admin/editReceptionist/{id}','App\Http\Controllers\UpdateController@editReceptionist');
    Route::get('/admin/deleteReceptionist/{id}','App\Http\Controllers\UpdateController@deleteReceptionist');
    Route::post('/admin/editReceptionist/','App\Http\Controllers\UpdateController@updateReceptionist');
    Route::get('/admin/addreceptionist','App\Http\Controllers\AdminController@addreceptionist')->name('employee.admin.addreceptionist');
    Route::post('/admin/addreceptionist','App\Http\Controllers\AdminController@storereceptionist')->name('receptionist.admin.register');

    Route::get('/admin/editMobiliser/{id}','App\Http\Controllers\UpdateController@editMobiliser');
    Route::get('/admin/deleteMobiliser/{id}','App\Http\Controllers\UpdateController@deleteMobiliser');
    Route::post('/admin/editMobiliser/','App\Http\Controllers\UpdateController@updateMobiliser');
    Route::get('/admin/addmobiliser','App\Http\Controllers\AdminController@addmobiliser')->name('employee.admin.addmobiliser');
    Route::post('/admin/addmobiliser','App\Http\Controllers\AdminController@storemobiliser')->name('mobiliser.admin.register');

    Route::get('/admin/editPeon/{id}','App\Http\Controllers\UpdateController@editPeon');
    Route::get('/admin/deletePeon/{id}','App\Http\Controllers\UpdateController@deletePeon');
    Route::post('/admin/editPeon/','App\Http\Controllers\UpdateController@updatePeon');
    Route::get('/admin/addpeon','App\Http\Controllers\AdminController@addpeon')->name('employee.admin.addpeon');
    Route::post('/admin/addpeon','App\Http\Controllers\AdminController@storepeon')->name('peon.admin.register');

    Route::get('/admin/editBranch/{id}','App\Http\Controllers\UpdateController@editBranch');
    Route::get('/admin/deleteBranch/{id}','App\Http\Controllers\UpdateController@deleteBranch');
    Route::post('/admin/editBranch/','App\Http\Controllers\UpdateController@updateBranch');
    Route::get('/admin/addbranch','App\Http\Controllers\AdminController@addbranch')->name('employee.admin.addbranch');
    Route::post('/admin/addbranch','App\Http\Controllers\AdminController@storebranch')->name('branch.admin.register');

    Route::get('/admin/editManager/{id}','App\Http\Controllers\UpdateController@editManager');
    Route::get('/admin/deleteManager/{id}','App\Http\Controllers\UpdateController@deleteManager');
    Route::post('/admin/editManager/','App\Http\Controllers\UpdateController@updateManager');
    Route::get('/admin/addmanager','App\Http\Controllers\AdminController@addmanager')->name('employee.admin.addmanager');
    Route::post('/admin/addmanager','App\Http\Controllers\AdminController@storemanager')->name('manager.admin.register');

    Route::get('/admin/editStudent/{id}','App\Http\Controllers\UpdateController@editStudent');
    Route::get('/admin/deleteStudent/{id}','App\Http\Controllers\UpdateController@deleteStudent');
    Route::post('/admin/editStudent/','App\Http\Controllers\UpdateController@updateStudent');
    Route::get('/admin/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.admin.addstudent');
    Route::post('/admin/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.admin.register');

    Route::post('/admin/viewbranch','App\Http\Controllers\BranchController@viewBranchDetails')->name('admin.viewbranch');

});



//For Manager
Route::group(['middleware' => ['auth','role:manager']],function(){
    Route::get('/manager/editTrainer/{id}','App\Http\Controllers\UpdateController@editTrainer');
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

    Route::get('/manager/editTrainer/{id}','App\Http\Controllers\UpdateController@editTrainer');
    Route::get('/manager/deleteTrainer/{id}','App\Http\Controllers\UpdateController@deleteTrainer');
    Route::post('/manager/editTrainer/','App\Http\Controllers\UpdateController@updateTrainer');
    Route::get('/manager/editCounsellor/{id}','App\Http\Controllers\UpdateController@editCounsellor');
    Route::get('/manager/deleteCounsellor/{id}','App\Http\Controllers\UpdateController@deleteCounsellor');
    Route::post('/manager/editCounsellor/','App\Http\Controllers\UpdateController@updateCounsellor');
    Route::get('/manager/editReceptionist/{id}','App\Http\Controllers\UpdateController@editReceptionist');
    Route::get('/manager/deleteReceptionist/{id}','App\Http\Controllers\UpdateController@deleteReceptionist');
    Route::post('/manager/editReceptionist/','App\Http\Controllers\UpdateController@updateReceptionist');
    Route::get('/manager/editMobiliser/{id}','App\Http\Controllers\UpdateController@editMobiliser');
    Route::get('/manager/deleteMobiliser/{id}','App\Http\Controllers\UpdateController@deleteMobiliser');
    Route::post('/manager/editMobiliser/','App\Http\Controllers\UpdateController@updateMobiliser');
    Route::get('/manager/editPeon/{id}','App\Http\Controllers\UpdateController@editPeon');
    Route::get('/manager/deletePeon/{id}','App\Http\Controllers\UpdateController@deletePeon');
    Route::post('/manager/editPeon/','App\Http\Controllers\UpdateController@updatePeon');
    Route::get('/manager/editManager/{id}','App\Http\Controllers\UpdateController@editManager');
    Route::get('/manager/deleteManager/{id}','App\Http\Controllers\UpdateController@deleteManager');
    Route::post('/manager/editManager/','App\Http\Controllers\UpdateController@updateManager');
    Route::get('/manager/editStudent/{id}','App\Http\Controllers\UpdateController@editStudent');
    Route::get('/manager/deleteStudent/{id}','App\Http\Controllers\UpdateController@deleteStudent');
    Route::post('/manager/editStudent/','App\Http\Controllers\UpdateController@updateStudent');

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

    Route::get('/branch/addmanager','App\Http\Controllers\AdminController@addmanager')->name('employee.branch.addmanager');
    Route::post('/branch/addmanager','App\Http\Controllers\AdminController@storemanager')->name('manager.branch.register');

    Route::get('/branch/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.branch.addstudent');
    Route::post('/branch/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.branch.register');

    Route::get('/branch/editTrainer/{id}','App\Http\Controllers\UpdateController@editTrainer');
    Route::get('/branch/deleteTrainer/{id}','App\Http\Controllers\UpdateController@deleteTrainer');
    Route::post('/branch/editTrainer/','App\Http\Controllers\UpdateController@updateTrainer');
    Route::get('/branch/editCounsellor/{id}','App\Http\Controllers\UpdateController@editCounsellor');
    Route::get('/branch/deleteCounsellor/{id}','App\Http\Controllers\UpdateController@deleteCounsellor');
    Route::post('/branch/editCounsellor/','App\Http\Controllers\UpdateController@updateCounsellor');
    Route::get('/branch/editReceptionist/{id}','App\Http\Controllers\UpdateController@editReceptionist');
    Route::get('/branch/deleteReceptionist/{id}','App\Http\Controllers\UpdateController@deleteReceptionist');
    Route::post('/branch/editReceptionist/','App\Http\Controllers\UpdateController@updateReceptionist');
    Route::get('/branch/editMobiliser/{id}','App\Http\Controllers\UpdateController@editMobiliser');
    Route::get('/branch/deleteMobiliser/{id}','App\Http\Controllers\UpdateController@deleteMobiliser');
    Route::post('/branch/editMobiliser/','App\Http\Controllers\UpdateController@updateMobiliser');
    Route::get('/branch/editPeon/{id}','App\Http\Controllers\UpdateController@editPeon');
    Route::get('/branch/deletePeon/{id}','App\Http\Controllers\UpdateController@deletePeon');
    Route::post('/branch/editPeon/','App\Http\Controllers\UpdateController@updatePeon');
    Route::get('/branch/editManager/{id}','App\Http\Controllers\UpdateController@editManager');
    Route::get('/branch/deleteManager/{id}','App\Http\Controllers\UpdateController@deleteManager');
    Route::post('/branch/editManager/','App\Http\Controllers\UpdateController@updateManager');
    Route::get('/branch/editStudent/{id}','App\Http\Controllers\UpdateController@editStudent');
    Route::get('/branch/deleteStudent/{id}','App\Http\Controllers\UpdateController@deleteStudent');
    Route::post('/branch/editStudent/','App\Http\Controllers\UpdateController@updateStudent');

});

//For Employee
Route::group(['middleware' => ['auth','role:employee']],function(){
    
    // Route::get('/employee/addstudent','App\Http\Controllers\AdminController@addstudent')->name('employee.employee.addstudent');
    // Route::post('/employee/addstudent','App\Http\Controllers\AdminController@storestudent')->name('student.employee.register');
    Route::get('/employee/editStudent/{id}','App\Http\Controllers\UpdateController@editStudent');
    Route::post('/employee/editStudent/','App\Http\Controllers\UpdateController@updateStudent');

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
