<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Frontend\FrontendController@index');
Route::get('/student/reg','Frontend\FrontendController@studentReg')->name('frontend.students.registration');
Route::post('/student/reg/store','Frontend\FrontendController@studentRegStore')->name('frontend.students.registration.store');
Route::get('/student/result/get','Frontend\FrontendController@studentResultGet')->name('frontend.students.result.get');
Route::get('/student/result/get/{code}','Frontend\FrontendController@studentResultPdf')->name('frontend.students.result.get.pdf');
Route::post('/student/result/search','Frontend\FrontendController@studentResultSearch')->name('frontend.students.result.search');
Route::get('/pdf/{slug}','Frontend\FrontendController@noticePdf')->name('frontend.notice.pdf');
Route::get('/detail/{slug}','Frontend\FrontendController@aboutDetail')->name('frontend.about.details');
Route::get('/details/{slug}','Frontend\FrontendController@messageDetail')->name('frontend.principal.msg.details');
Route::get('/student/result','Frontend\FrontendController@studentResult')->name('frontend.student.result');
Route::get('/notice/board','Frontend\FrontendController@noticeBoard')->name('frontend.notice.board');
Route::get('/mission-vision','Frontend\FrontendController@missionVision')->name('frontend.mission.vision');
Route::get('/slogan/{slug}','Frontend\FrontendController@sloganDetails')->name('frontend.slogan.details');
Route::get('/contact-us','Frontend\FrontendController@contactUs')->name('frontend.contact.us');
Route::post('/contact/store','Frontend\FrontendController@contactStore')->name('frontend.contact.store');
Route::get('/contact/get','Frontend\FrontendController@contactGet')->name('frontend.contact.get');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){


Route::prefix('users')->group(function(){

Route::get('/view', 'Backend\UserController@view')->name('users.view');
Route::get('/add', 'Backend\UserController@add')->name('users.add');
Route::post('/store', 'Backend\UserController@store')->name('users.store');
Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');

});


Route::prefix('profile')->group(function(){

Route::get('/view', 'Backend\ProfileController@view')->name('profile.view');
Route::get('/edit', 'Backend\ProfileController@edit')->name('profile.edit');
Route::post('/store', 'Backend\ProfileController@update')->name('profile.update');
Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profile.password.view');
Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profile.password.update');
});

// Author By Asadullah
Route::prefix('web-site')->group(function(){
	//Contact Us
	Route::get('/contact/view','Backend\Website\ContactController@view')->name('web-site.contact.view');
	Route::get('/contact/add','Backend\Website\ContactController@add')->name('web-site.contact.add');
	Route::post('/contact/store','Backend\Website\ContactController@store')->name('web-site.contact.store');
	Route::get('/contact/edit/{id}','Backend\Website\ContactController@edit')->name('web-site.contact.edit');
	Route::post('/contact/update/{id}','Backend\Website\ContactController@update')->name('web-site.contact.update');
	Route::post('/contact/delete','Backend\Website\ContactController@delete')->name('web-site.contact.delete');
	//Important Link
	Route::get('/link/view','Backend\Website\LinkController@view')->name('web-site.link.view');
	Route::get('/link/add','Backend\Website\LinkController@add')->name('web-site.link.add');
	Route::post('/link/store','Backend\Website\LinkController@store')->name('web-site.link.store');
	Route::get('/link/edit/{id}','Backend\Website\LinkController@edit')->name('web-site.link.edit');
	Route::post('/link/update/{id}','Backend\Website\LinkController@update')->name('web-site.link.update');
	Route::post('/link/delete','Backend\Website\LinkController@delete')->name('web-site.link.delete');
	//Notice
	Route::get('/notice/view','Backend\Website\NoticeController@view')->name('web-site.notice.view');
	Route::get('/notice/add','Backend\Website\NoticeController@add')->name('web-site.notice.add');
	Route::post('/notice/store','Backend\Website\NoticeController@store')->name('web-site.notice.store');
	Route::get('/notice/edit/{id}','Backend\Website\NoticeController@edit')->name('web-site.notice.edit');
	Route::post('/notice/update/{id}','Backend\Website\NoticeController@update')->name('web-site.notice.update');
	Route::post('/notice/delete','Backend\Website\NoticeController@delete')->name('web-site.notice.delete');
	//About
	Route::get('/about/view','Backend\Website\AboutController@view')->name('web-site.about.view');
	Route::get('/about/add','Backend\Website\AboutController@add')->name('web-site.about.add');
	Route::post('/about/store','Backend\Website\AboutController@store')->name('web-site.about.store');
	Route::get('/about/edit/{id}','Backend\Website\AboutController@edit')->name('web-site.about.edit');
	Route::post('/about/update/{id}','Backend\Website\AboutController@update')->name('web-site.about.update');
	Route::post('/about/delete','Backend\Website\AboutController@delete')->name('web-site.about.delete');
	//Principal Message
	Route::get('/message/view','Backend\Website\MessageController@view')->name('web-site.principal.message.view');
	Route::get('/message/add','Backend\Website\MessageController@add')->name('web-site.principal.message.add');
	Route::post('/message/store','Backend\Website\MessageController@store')->name('web-site.principal.message.store');
	Route::get('/message/edit/{id}','Backend\Website\MessageController@edit')->name('web-site.principal.message.edit');
	Route::post('/message/update/{id}','Backend\Website\MessageController@update')->name('web-site.principal.message.update');
	Route::post('/message/delete','Backend\Website\MessageController@delete')->name('web-site.principal.message.delete');
	//Mission-vision
	Route::get('/mission-vision/view','Backend\Website\MissionController@view')->name('web-site.mission-vision.view');
	Route::get('/mission-vision/add','Backend\Website\MissionController@add')->name('web-site.mission-vision.add');
	Route::post('/mission-vision/store','Backend\Website\MissionController@store')->name('web-site.mission-vision.store');
	Route::get('/mission-vision/edit/{id}','Backend\Website\MissionController@edit')->name('web-site.mission-vision.edit');
	Route::post('/mission-vision/update/{id}','Backend\Website\MissionController@update')->name('web-site.mission-vision.update');
	Route::post('/mission-vision/delete','Backend\Website\MissionController@delete')->name('web-site.mission-vision.delete');
	//Slogan
	Route::get('/slogan/view','Backend\Website\SloganController@view')->name('web-site.slogan.view');
	Route::get('/slogan/add','Backend\Website\SloganController@add')->name('web-site.slogan.add');
	Route::post('/slogan/store','Backend\Website\SloganController@store')->name('web-site.slogan.store');
	Route::get('/slogan/edit/{id}','Backend\Website\SloganController@edit')->name('web-site.slogan.edit');
	Route::post('/slogan/update/{id}','Backend\Website\SloganController@update')->name('web-site.slogan.update');
	Route::post('/slogan/delete','Backend\Website\SloganController@delete')->name('web-site.slogan.delete');
	//Slider
	Route::get('/slider/view','Backend\Website\SliderController@view')->name('web-site.slider.view');
	Route::get('/slider/add','Backend\Website\SliderController@add')->name('web-site.slider.add');
	Route::post('/slider/store','Backend\Website\SliderController@store')->name('web-site.slider.store');
	Route::get('/slider/edit/{id}','Backend\Website\SliderController@edit')->name('web-site.slider.edit');
	Route::post('/slider/update/{id}','Backend\Website\SliderController@update')->name('web-site.slider.update');
	Route::post('/slider/delete','Backend\Website\SliderController@delete')->name('web-site.slider.delete');
	//Contactor
	Route::get('/contactor/view','Backend\Website\ContactorController@view')->name('web-site.contactor.view');
	Route::get('/contactor/add','Backend\Website\ContactorController@add')->name('web-site.contactor.add');
	Route::post('/contactor/store','Backend\Website\ContactorController@store')->name('web-site.contactor.store');
	Route::get('/contactor/detail/{id}','Backend\Website\ContactorController@detail')->name('web-site.contactor.detail');
	Route::post('/contactor/update/{id}','Backend\Website\ContactorController@update')->name('web-site.contactor.update');
	Route::post('/contactor/delete','Backend\Website\ContactorController@delete')->name('web-site.contactor.delete');
});


Route::prefix('setups')->group(function(){
	//student Class
Route::get('/student/class/view', 'Backend\Setup\StudentClassController@view')->name('setups.student.class.view');
Route::get('/student/class/add', 'Backend\Setup\StudentClassController@add')->name('setups.student.class.add');
Route::post('/student/class/store', 'Backend\Setup\StudentClassController@store')->name('setups.student.class.store');
Route::get('/student/class/edit/{id}', 'Backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
Route::post('/student/class/update/{id}', 'Backend\Setup\StudentClassController@update')->name('setups.student.class.update');
Route::get('/student/class/delete/{id}', 'Backend\Setup\StudentClassController@delete')->name('setups.student.class.delete');


///Year/ Session

Route::get('/student/year/view', 'Backend\Setup\YearController@view')->name('setups.year.view');
Route::get('/student/year/add', 'Backend\Setup\YearController@add')->name('setups.year.add');
Route::post('/student/year/store', 'Backend\Setup\YearController@store')->name('setups.year.store');
Route::get('/student/year/edit/{id}', 'Backend\Setup\YearController@edit')->name('setups.year.edit');
Route::post('/student/year/update/{id}', 'Backend\Setup\YearController@update')->name('setups.year.update');
Route::get('/student/year/delete/{id}', 'Backend\Setup\YearController@delete')->name('setups.year.delete');




///Student Group

Route::get('/student/group/view', 'Backend\Setup\GroupController@view')->name('setups.group.view');
Route::get('/student/group/add', 'Backend\Setup\GroupController@add')->name('setups.group.add');
Route::post('/student/group/store', 'Backend\Setup\GroupController@store')->name('setups.group.store');
Route::get('/student/group/edit/{id}', 'Backend\Setup\GroupController@edit')->name('setups.group.edit');
Route::post('/student/group/update/{id}', 'Backend\Setup\GroupController@update')->name('setups.group.update');
Route::get('/student/group/delete/{id}', 'Backend\Setup\GroupController@delete')->name('setups.group.delete');


///Student Shift
Route::get('/student/shift/view', 'Backend\Setup\ShiftController@view')->name('setups.shift.view');
Route::get('/student/shift/add', 'Backend\Setup\ShiftController@add')->name('setups.shift.add');
Route::post('/student/shift/store', 'Backend\Setup\ShiftController@store')->name('setups.shift.store');
Route::get('/student/shift/edit/{id}', 'Backend\Setup\ShiftController@edit')->name('setups.shift.edit');
Route::post('/student/shift/update/{id}', 'Backend\Setup\ShiftController@update')->name('setups.shift.update');
Route::get('/student/shift/delete/{id}', 'Backend\Setup\ShiftController@delete')->name('setups.shift.delete');



///Fee Category

Route::get('/fee/category/view', 'Backend\Setup\FeeCategoryController@view')->name('setups.fee.category.view');
Route::get('/fee/category/add', 'Backend\Setup\FeeCategoryController@add')->name('setups.fee.category.add');
Route::post('/fee/category/store', 'Backend\Setup\FeeCategoryController@store')->name('setups.fee.category.store');
Route::get('/fee/category/edit/{id}', 'Backend\Setup\FeeCategoryController@edit')->name('setups.fee.category.edit');
Route::post('/fee/category/update/{id}', 'Backend\Setup\FeeCategoryController@update')->name('setups.fee.category.update');
Route::get('/fee/category/delete/{id}', 'Backend\Setup\FeeCategoryController@delete')->name('setups.fee.category.delete');


///Fee Category Amount

Route::get('/fee/amount/view', 'Backend\Setup\FeeAmountController@view')->name('setups.fee.amount.view');
Route::get('/fee/amount/add', 'Backend\Setup\FeeAmountController@add')->name('setups.fee.amount.add');
Route::post('/fee/amount/store', 'Backend\Setup\FeeAmountController@store')->name('setups.fee.amount.store');
Route::get('/fee/amount/edit/{fee_category_id}', 'Backend\Setup\FeeAmountController@edit')->name('setups.fee.amount.edit');
Route::post('/fee/amount/update/{fee_category_id}', 'Backend\Setup\FeeAmountController@update')->name('setups.fee.amount.update');
Route::get('/fee/amount/delete', 'Backend\Setup\FeeAmountController@delete')->name('setups.fee.amount.delete');
Route::get('/fee/amount/details/{fee_category_id}', 'Backend\Setup\FeeAmountController@details')->name('setups.fee.amount.details');


///Exal Type

Route::get('/exam/type/view', 'Backend\Setup\ExamTypeController@view')->name('setups.exam.type.view');
Route::get('/exam/type/add', 'Backend\Setup\ExamTypeController@add')->name('setups.exam.type.add');
Route::post('/exam/type/store', 'Backend\Setup\ExamTypeController@store')->name('setups.exam.type.store');
Route::get('/exam/type/edit/{id}', 'Backend\Setup\ExamTypeController@edit')->name('setups.exam.type.edit');
Route::post('/exam/type/update/{id}', 'Backend\Setup\ExamTypeController@update')->name('setups.exam.type.update');
Route::get('/exam/type/delete', 'Backend\Setup\ExamTypeController@delete')->name('setups.exam.type.delete');


///Subject View

Route::get('/subject/view', 'Backend\Setup\SubjectController@view')->name('setups.subject.view');
Route::get('/subject/add', 'Backend\Setup\SubjectController@add')->name('setups.subject.add');
Route::post('/subject/store', 'Backend\Setup\SubjectController@store')->name('setups.subject.store');
Route::get('/subject/edit/{id}', 'Backend\Setup\SubjectController@edit')->name('setups.subject.edit');
Route::post('/subject/update/{id}', 'Backend\Setup\SubjectController@update')->name('setups.subject.update');
Route::get('/subject/delete', 'Backend\Setup\SubjectController@delete')->name('setups.subject.delete');


///Assign Subject
Route::get('/assign/subject/view', 'Backend\Setup\AssignSubjectController@view')->name('setups.assign.subject.view');
Route::get('/assign/subject/add', 'Backend\Setup\AssignSubjectController@add')->name('setups.assign.subject.add');
Route::post('/assign/subject/store', 'Backend\Setup\AssignSubjectController@store')->name('setups.assign.subject.store');
Route::get('/assign/subject/edit/{class_id}', 'Backend\Setup\AssignSubjectController@edit')->name('setups.assign.subject.edit');
Route::post('/assign/subject/update/{class_id}', 'Backend\Setup\AssignSubjectController@update')->name('setups.assign.subject.update');
Route::get('/assign/subject/delete', 'Backend\Setup\AssignSubjectController@delete')->name('setups.assign.subject.delete');
Route::get('/assign/subject/details/{class_id}', 'Backend\Setup\AssignSubjectController@details')->name('setups.assign.subject.details');


///Desigtion

Route::get('/designation/view', 'Backend\Setup\DesignationController@view')->name('setups.designation.view');
Route::get('/designation/add', 'Backend\Setup\DesignationController@add')->name('setups.designation.add');
Route::post('/designation/store', 'Backend\Setup\DesignationController@store')->name('setups.designation.store');
Route::get('/designation/edit/{id}', 'Backend\Setup\DesignationController@edit')->name('setups.designation.edit');
Route::post('/designation/update/{id}', 'Backend\Setup\DesignationController@update')->name('setups.designation.update');

///Desigtion

Route::get('/designation/view', 'Backend\Setup\DesignationController@view')->name('setups.designation.view');
Route::get('/designation/add', 'Backend\Setup\DesignationController@add')->name('setups.designation.add');
Route::post('/designation/store', 'Backend\Setup\DesignationController@store')->name('setups.designation.store');
Route::get('/designation/edit/{id}', 'Backend\Setup\DesignationController@edit')->name('setups.designation.edit');
Route::post('/designation/update/{id}', 'Backend\Setup\DesignationController@update')->name('setups.designation.update');
});



Route::prefix('students')->group(function(){

///Students Registration

Route::get('/reg/view', 'Backend\Student\StudentRegController@view')->name('students.registration.view');
Route::get('/reg/add', 'Backend\Student\StudentRegController@add')->name('students.registration.add');
Route::post('/reg/store', 'Backend\Student\StudentRegController@store')->name('students.registration.store');
Route::get('/reg/edit/{student_id}', 'Backend\Student\StudentRegController@edit')->name('students.registration.edit');
Route::post('/reg/update/{student_id}', 'Backend\Student\StudentRegController@update')->name('students.registration.update');
Route::get('/year-class-wise', 'Backend\Student\StudentRegController@yearClassWise')->name('students.year.class.wise');


Route::get('/reg/promotion/{student_id}', 'Backend\Student\StudentRegController@promotion')->name('students.registration.promotion');
Route::post('/reg/promotion/{student_id}', 'Backend\Student\StudentRegController@promotionStore')->name('students.registration.promotion.store');
Route::get('/reg/details/{student_id}', 'Backend\Student\StudentRegController@details')->name('students.registration.details');

//Roll Generate

Route::get('/roll/view', 'Backend\Student\StudentRollController@view')->name('students.roll.view');
Route::get('/roll/get-student', 'Backend\Student\StudentRollController@getStudent')->name('students.roll.get-student');
Route::post('/roll/store', 'Backend\Student\StudentRollController@store')->name('students.roll.store');



//student Registration Fee

Route::get('/reg/fee/view', 'Backend\Student\RegistrationFeeController@view')->name('students.reg.fee.view');
Route::get('/reg/get/student', 'Backend\Student\RegistrationFeeController@getStudent')->name('students.reg.fee.get-student');
Route::get('/reg/fee/payslip', 'Backend\Student\RegistrationFeeController@Payslip')->name('students.reg.fee.payslip');


//student month Fee

Route::get('/month/fee/view', 'Backend\Student\MonthlyFeeController@view')->name('students.monthly.fee.view');
Route::get('/month/get/student', 'Backend\Student\MonthlyFeeController@getStudent')->name('students.monthly.fee.get-student');
Route::get('/month/fee/payslip', 'Backend\Student\MonthlyFeeController@Payslip')->name('students.monthly.fee.payslip');


//student exam Fee

Route::get('/exam/fee/view', 'Backend\Student\ExamFeeController@view')->name('students.exam.fee.view');
Route::get('/exam/get/student', 'Backend\Student\ExamFeeController@getStudent')->name('students.exam.fee.get-student');
Route::get('/exam/fee/payslip', 'Backend\Student\ExamFeeController@Payslip')->name('students.exam.fee.payslip');
	});


Route::prefix('employees')->group(function(){

//employee Registration 
Route::get('/reg/view', 'Backend\Employee\EmployeeRegController@view')->name('employees.reg.view');
Route::get('/reg/add', 'Backend\Employee\EmployeeRegController@add')->name('employees.reg.add');
Route::post('/reg/store', 'Backend\Employee\EmployeeRegController@store')->name('employees.reg.store');
Route::get('/reg/edit/{id}', 'Backend\Employee\EmployeeRegController@edit')->name('employees.reg.edit');
Route::post('/reg/update/{id}', 'Backend\Employee\EmployeeRegController@update')->name('employees.reg.update');
Route::get('/reg/delete/{id}', 'Backend\Employee\EmployeeRegController@delete')->name('employees.reg.delete');
Route::get('/reg/details/{id}', 'Backend\Employee\EmployeeRegController@details')->name('employees.reg.details');

//employee salary  

Route::get('/salary/view', 'Backend\Employee\EmployeeSalaryController@view')->name('employees.salary.view');
Route::get('/salary/increment/{id}', 'Backend\Employee\EmployeeSalaryController@increment')->name('employees.salary.increment');
Route::post('/salary/store/{id}', 'Backend\Employee\EmployeeSalaryController@store')->name('employees.salary.store');
Route::get('/salary/details/{id}', 'Backend\Employee\EmployeeSalaryController@details')->name('employees.salary.details');


//employee LEAVE
Route::get('/leave/view', 'Backend\Employee\EmployeeLeaveController@view')->name('employees.leave.view');
Route::get('/leave/add', 'Backend\Employee\EmployeeLeaveController@add')->name('employees.leave.add');
Route::post('/leave/store', 'Backend\Employee\EmployeeLeaveController@store')->name('employees.leave.store');
Route::get('/leave/edit/{id}', 'Backend\Employee\EmployeeLeaveController@edit')->name('employees.leave.edit');
Route::post('/leave/update/{id}', 'Backend\Employee\EmployeeLeaveController@update')->name('employees.leave.update');



//employee Attendace
Route::get('/attend/view', 'Backend\Employee\EmployeeAttendController@view')->name('employees.attendance.view');
Route::get('/attend/add', 'Backend\Employee\EmployeeAttendController@add')->name('employees.attendance.add');
Route::post('/attend/store', 'Backend\Employee\EmployeeAttendController@store')->name('employees.attendance.store');
Route::get('/attend/edit/{date}', 'Backend\Employee\EmployeeAttendController@edit')->name('employees.attendance.edit');
Route::get('/attend/details/{date}', 'Backend\Employee\EmployeeAttendController@details')->name('employees.attendance.details');


//employee Salary
Route::get('/monthly/salary/view', 'Backend\Employee\EmployeeMonthlySalaryController@view')->name('employees.monthly.salary.view');
Route::get('/monthly/salary/get', 'Backend\Employee\EmployeeMonthlySalaryController@getSalary')->name('employees.monthly.salary.get');
Route::get('/monthly/salary/payslip/{employee_id}', 'Backend\Employee\EmployeeMonthlySalaryController@paySlip')->name('employees.monthly.salary.payslip');


});

Route::prefix('marks')->group(function(){

	Route::get('/add','Backend\Marks\MarksController@add')->name('marks.add');
	Route::post('/store','Backend\Marks\MarksController@store')->name('marks.store');
	Route::get('/edit','Backend\Marks\MarksController@edit')->name('marks.edit');
	Route::get('/get-student-marks','Backend\Marks\MarksController@getMarks')->name('get-student-marks');

	Route::post('/update','Backend\Marks\MarksController@update')->name('marks.update');




	///Greate point

Route::get('/grade/view', 'Backend\Marks\GradeController@view')->name('marks.grade.view');
Route::get('/grade/add', 'Backend\Marks\GradeController@add')->name('marks.grade.add');
Route::post('/grade/store', 'Backend\Marks\GradeController@store')->name('marks.grade.store');
Route::get('/grade/edit/{id}', 'Backend\Marks\GradeController@edit')->name('marks.grade.edit');
Route::post('/grade/update/{id}', 'Backend\Marks\GradeController@update')->name('marks.grade.update');
});


Route::prefix('accounts')->group(function(){

		//Student Fee
	Route::get('/student/fee/view', 'Backend\Accounts\StudentFeeController@view')->name('accounts.fee.view');
Route::get('/student/fee/add', 'Backend\Accounts\StudentFeeController@add')->name('accounts.fee.add');
Route::post('/student/fee/store', 'Backend\Accounts\StudentFeeController@store')->name('accounts.fee.store');
Route::get('/student/getstudent', 'Backend\Accounts\StudentFeeController@getstudent')->name('accounts.fee.getstudent');



		//Emoloyee Salary
	Route::get('/employee/salary/view', 'Backend\Accounts\SalaryController@view')->name('accounts.salary.view');
Route::get('/employee/salary/add', 'Backend\Accounts\SalaryController@add')->name('accounts.salary.add');
Route::post('/employee/salary/store', 'Backend\Accounts\SalaryController@store')->name('accounts.salary.store');
Route::get('/employee/get-employee', 'Backend\Accounts\SalaryController@getEmployee')->name('accounts.salary.get-employee');




//Others Cost
	Route::get('/cost/view', 'Backend\Accounts\OthersCostController@view')->name('accounts.cost.view');
Route::get('/cost/add', 'Backend\Accounts\OthersCostController@add')->name('accounts.cost.add');
Route::post('/cost/store', 'Backend\Accounts\OthersCostController@store')->name('accounts.cost.store');
Route::get('/cost/edit/{id}', 'Backend\Accounts\OthersCostController@edit')->name('accounts.cost.edit');
Route::post('/cost/update/{id}', 'Backend\Accounts\OthersCostController@update')->name('accounts.cost.update');
});


Route::prefix('reports')->group(function(){
//Profit
Route::get('/profit/view', 'Backend\Reports\ProfitController@view')->name('reports.profit.view');
Route::get('/profit/get', 'Backend\Reports\ProfitController@profit')->name('reports.profit.datewise.get');
Route::get('/profit/pdf', 'Backend\Reports\ProfitController@pdf')->name('reports.profit.pdf');


//Mark Sheet
Route::get('/marksheet/view', 'Backend\Reports\ProfitController@markSheetView')->name('reports.marksheet.view');
Route::get('/marksheet/get', 'Backend\Reports\ProfitController@marksheetGet')->name('reports.marksheet.get');



//Attendence Report
Route::get('/attendance/view', 'Backend\Reports\ProfitController@attendanceView')->name('reports.attendance.view');
Route::get('/attendance/get', 'Backend\Reports\ProfitController@attendanceGet')->name('reports.attendance.get');



//All Student ID Card
Route::get('/id-card/view', 'Backend\Reports\ProfitController@idCardView')->name('reports.id.card.view');
Route::get('/card/get', 'Backend\Reports\ProfitController@idCardGet')->name('reports.id.card.get');

//Created By Asadullah
Route::get('/admission/view', 'Backend\Reports\ProfitController@admissionList')->name('reports.student.admission.view');
Route::get('/admission/pdf/{id}', 'Backend\Reports\ProfitController@admissionPdf')->name('reports.student.admission.pdf');
Route::post('/admission/approve', 'Backend\Reports\ProfitController@admissionApprove')->name('reports.student.admission.approve');
Route::post('/admission/reject', 'Backend\Reports\ProfitController@admissionReject')->name('reports.student.admission.reject');
Route::post('/admission/select', 'Backend\Reports\ProfitController@admissionSelect')->name('reports.student.admission.select');
Route::get('/all-student/get', 'Backend\Reports\ProfitController@allStudentGet')->name('reports.student.admission.all-student.get');
Route::get('/all-student/get/pdf', 'Backend\Reports\ProfitController@allStudentGetPdf')->name('reports.student.admission.all-student.get.pdf');

});





Route::get('/get-student','Backend\DefaultController@getStudent')->name('get-student');
Route::get('/get-subject','Backend\DefaultController@getSubject')->name('get-subject');

});




