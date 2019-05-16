<?php

use App\User;
use App\Course;
use App\Classer;
use App\Events\FireEvent;
use App\Notifications\SampleNotification;

Route::get('sessionconfig', function(){
    return config("session.name");
});

Route::get('studentupdate', function(){
    $students = User::all(); 
    $counter = 1;
    foreach($students as $student)
    {
        $student->username = "student" . $counter;
        $student->contact_number = "000-0000-000";
        $student->contact_number1 = "111-1111-111";
        $student->save();
        $counter++;
    }
});


Route::get('changetime', function(){
    return time_select();
});

Route::get('fire', function(){
    App\Admin::find(1)->notify( new SampleNotification("hello"));
    //broadcast(new FireEvent());
});

Route::get('fixcredits', function(){
    $classes = Classer::all();
    foreach($classes as $class)
    {
        $session = $class->classSession()->where('postponed_deduction', 1)->count();
        $course =  Course::where('id', $class->course_id)->first();
        $credits = $course->postponed_credit;
        $class->postponed_credits = $credits - $session;
        $class->save(); 
    }
});

Route::get('/fixteachers', 'Admin\ClasserController@fixSessionTeacher');


Route::get('/configcache', function () {    
    \Artisan::call('cache:clear');
});

Route::get('/clearview', function () {    
    \Artisan::call('view:clear');
});



Route::get('info', function(){
return  phpinfo();
});


Route::get('todayclass', function(){
    //return today_classroom(); 
    $array = array();
    for($i= 0; count(postponed_managers()) > $i; $i++):
        $ar = array(
            'ad' => postponed_managers()[$i]['url']
        );
        array_push($array, $ar);
    endfor; 

    return $array;
});

Route::get('enrollment/req', "EnrollmentController@req");

Route::get('clearsession', function(){
    \Session::forget('popup');
    \Session::forget('noti_top');
});



Route::get('today', function(){
    return today_classroom();
});


Route::get('/admin', function(){
    return redirect('admin/login');
});

Route::get('/teacher', function(){
    return redirect('teacher/login');
});




Route::get('page/{page}', 'PageController@page')->name('page');
Route::get('testimonial', 'TestimonialController@index')->name('testimonial');
Route::get('testimonial/{id}', 'TestimonialController@show')->name('testimonial.show');

Route::get('admin/login', 'Auth\Backend\LoginController@showLoginForm')->name('admin.login')->middleware('adminredirect');
Route::get('teacher/login', 'Auth\Backend\LoginController@showLoginForm')->name('teacher.login')->middleware('adminredirect');

Route::post('teacher/login', 'Auth\Backend\LoginController@login')->name('teacher.login.post');
Route::post('admin/login', 'Auth\Backend\LoginController@login')->name('admin.login.post');
Route::post('admin/logout', 'Auth\Backend\LoginController@logout')->name('admin.logout');
Route::get('admin/password/reset', 'Auth\Backend\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Auth\Backend\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Auth\Backend\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Auth\Backend\ResetPasswordController@reset');

Auth::routes();

/*
    ============= end of auth routes ==============
*/


/*
    ============= Level Test ==============
    */
Route::get('leveltest/register', 'LevelTestController@register')->name('leveltest.register');
Route::post('leveltestlogin', 'LevelTestController@login')->name('leveltest.login');
Route::resource('leveltest', 'LevelTestController');

/*
  Front-end Routes
*/
Route::get('/', 'PageController@index')->name('page.home');
Route::get('/postponed', 'PageController@postponed')->name('page.postponed');

//contents
Route::get('inquiry', 'InquiryController@index')->name('inquiry');
Route::get('inquiry/create', 'InquiryController@create')->name('inquiry.create');
Route::get('inquiry/{slug}', 'InquiryController@show')->name('inquiry.show');
Route::post('inquiry/', 'InquiryController@store')->name('inquiry.store');
Route::post('inquiry/verify', 'InquiryController@verify')->name('inquiry.verify');
Route::post('inquiry/reply', 'InquiryController@reply')->name('inquiry.reply');

//notice
Route::get('/notice/{slug}', 'NoticeController@show')->name('notice.show');
Route::get('/notice', 'NoticeController@index')->name('notice');

//faq
Route::get('faq', 'FaqController@index')->name('faq');

//Curriculum
Route::get('/cur', 'CurriculumController@index')->name('curriculum');

//blog
Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');
Route::get('/blog', 'BlogController@index')->name('blog');

Route::get('/course', 'PageController@course')->name('page.course');
Route::post('/course', 'PageController@coursequery')->name('page.post.course');
Route::post('selectcourse/{id}', "PageController@select")->name('course.select');

Route::get('/course/getmonth/{id}', 'PageController@getMonths')->name('page.getmonths');
Route::get('/course/daysweek/{id}', 'PageController@daysweek')->name('page.daysweek');
Route::get('/course/getminutes/{id}', 'PageController@getminutes')->name('page.getminutes');
Route::get('/course/minutes/{id}/{month}', 'PageController@minutes')->name('page.minutes');
Route::get('/course/getcourse/{id}/{daysweek}/{minutes}', 'PageController@getCourse')->name('page.getCourse');


//Teacher Routes
Route::get('teacherprofile', 'TeacherController@index')->name('teacher');
Route::get('teacherprofile/{username}', 'TeacherController@show')->name('teacher.show');

//Coupon Features Routes
Route::post('enrollment/coupon/validate', 'EnrollmentController@validateCoupon')->name('enrollment.coupon.validate');

//Enrollment Routes
Route::get('enrollment','EnrollmentController@step1')->name('enrollment.step1');
Route::get('enrollment/sample','EnrollmentController@index')->name('enrollment.index');

Route::post('enrollment', 'EnrollmentController@step1post')->name('enrollment.step1post');    

Route::get('enrollment/step2', 'EnrollmentController@step2')->middleware('auth')->name('enrollment.step2');

Route::post('enrollment/step2', 'EnrollmentController@step2Save')->middleware('auth')->name('enrollment.step2.save');

Route::get('enrollment/step3', 'EnrollmentController@step3')->middleware('auth')->name('enrollment.step3');

Route::post('enrollment/step3', 'EnrollmentController@step3Save')->middleware('auth')->name('enrollment.step3.save');

Route::post('enrollment/bank', 'EnrollmentController@bank')->middleware('auth')->name('enrollment.bank');

Route::post('enrollment/savefreeclass', 'EnrollmentController@save')->middleware('auth')->name('enrollment.save.freeclass');

Route::post('enrollment/creditcard', 'EnrollmentController@creditcard')->middleware('auth')->name('enrollment.creditcard');
//Route::post('enrollment/creditcard', 'EnrollmentController@creditcard')->name('enrollment.creditcard');
Route::get('enrollment/creditcard', 'EnrollmentController@creditcard')->name('enrollment.creditcard');

Route::get('enrollment/reciept/{code?}', 'EnrollmentController@reciept')->middleware('auth')->name('enrollment.reciept');


Route::get('api/book/preview/{id}/{per_page}', 'API\BookApiController@preview');
Route::get('api/book/all/', 'API\BookApiController@all');


//Admin Routes
Route::group(array('prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin', 'admin', 'notiautodelete']), function(){
        //System API for notification
        Route::get('api/notification', 'API\Admin\NotificationApiController@get_latest');    
        Route::get('api/notification/markall', 'API\Admin\NotificationApiController@markall');    
        Route::get('api/unreadnotification', 'API\Admin\NotificationApiController@get_unread');    

    //System Api for class
        Route::post('api/classlist/{id}/{per_page}', 'API\Admin\ClassApiController@classShowList');
        Route::post('api/class/log/{id}', 'API\Admin\ClassApiController@getLogs');
        Route::post('api/class/log/update/{class_id}/{log_id}', 'API\Admin\ClassApiController@updateLogs');
        Route::post('api/class/log/delete/{class_id}/{log_id}', 'API\Admin\ClassApiController@deleteLogs');
        Route::post('api/class/{id}/', 'API\Admin\ClassApiController@index');
        Route::post('api/sessioninfo/{id}', 'API\Admin\ClassApiController@sessionInfo');
        Route::get('api/class/credits/{id}','API\Admin\ClassApiController@credits');
        Route::post('api/class/credits/update/{id}','API\Admin\ClassApiController@updatecredits');
        //System Api for Coupon system
        Route::post('api/getcodes/{no}', 'Admin\CouponController@getGenatedCode');

        //System Api for session
        Route::post('api/submission/{id}', 'API\Admin\ClassApiController@submission');
        Route::post('api/updatesessionstatus/{id}', 'API\Admin\ClassApiController@updatesessionstatus');
        Route::post('api/updatecomment/{id}', 'API\Admin\ClassApiController@updatecomment');
        Route::post('api/updatecomprehension/{id}', 'API\Admin\ClassApiController@updatecomprehension');
        Route::post('api/updatepronounciation/{id}', 'API\Admin\ClassApiController@updatepronounciation');
        Route::post('api/updatefluency/{id}', 'API\Admin\ClassApiController@updatefluency');
        Route::post('api/updatevocabulary/{id}', 'API\Admin\ClassApiController@updatevocabulary');
        Route::post('api/updategrammar/{id}', 'API\Admin\ClassApiController@updategrammar');
        
        Route::get('api/sessions/{id}', 'API\Admin\ClassApiController@sessions' );
        Route::get('api/sessions_submission/{id}', 'API\Admin\ClassApiController@sessions' );
        Route::get('api/postponedsessions/{id}', 'API\Admin\ClassApiController@postponedsessions' );
        
        //System Api for Student
        Route::post('api/studentremarks/{id}', 'API\Admin\ClassApiController@StudentRemarks');
        Route::post('api/updatestudentremarks/{id}', 'API\Admin\ClassApiController@updateStudentRemarks');
        
        //System Api for book
        Route::resource('api/book/', 'API\Admin\BookApiController');
        Route::post('api/updateclassbook/{class_id}', 'API\Admin\BookApiController@updateClassBook');
        Route::post('api/updateclassbookpage/{class_id}', 'API\Admin\BookApiController@updateClassBookPage');
        
        //System Api for Mistake
        Route::post('api/mistake/{id}', 'API\Admin\MistakeApiController@index');
        Route::post('api/mistake/delete/{id}', 'API\Admin\MistakeApiController@destroy');
        
        //System Api for teacher
        Route::post('api/teachers', 'API\Admin\TeacherApiController@index');
        
        Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
        Route::get('teacher/datatable', 'Admin\TeacherController@datatable')->name('teacher.datatable');
        Route::get('teacher/messenger', 'Admin\TeacherController@messenger')->name('teacher.messenger');
        Route::Resource('teacher', 'Admin\TeacherController');
        Route::resource('message', 'Admin\MessageController');
        Route::get('get_message', 'Admin\NotificationController@getMessage');
        
        Route::put('student/updateremarks/{id}', 'Admin\StudentController@updateremarks')->name('student.updateremarks');
        Route::get('student/json', 'Admin\StudentController@json');
        Route::get('student/importtestimonial', 'Admin\StudentController@importTestimonial');
        Route::Resource('student', 'Admin\StudentController');
        Route::Resource('teacherprofile', 'Admin\TeacherProfileController');
        
        Route::get('proofreading/new', 'Admin\ProofReadingController@new')->name('proofreading.new');
        Route::Resource('proofreading', 'Admin\ProofReadingController');
        
        Route::get('coupon/unused', 'Admin\CouponController@unused')->name('coupon.unused');
        Route::Resource('coupon', 'Admin\CouponController');
        Route::Resource('course', 'Admin\CourseController');
        Route::Resource('coursetype', 'Admin\CourseTypeController');
        Route::Resource('holiday', 'Admin\HolidayController');
        Route::Resource('book', 'Admin\BookController');
        Route::get('notice/totop/{id}', 'Admin\NoticeController@updateTop')->name('notice.totop');
        Route::Resource('notice', 'Admin\NoticeController');
        Route::resource('curriculum', 'Admin\CurriculumController');
        Route::resource('banner', 'Admin\BannerController');
        
        //classes Routes
        Route::get('/classer/all', 'Admin\ClasserController@allClass')->name('classer.all');
        Route::post('/classer/reenoll/{id}', 'Admin\ClasserController@reEnroll')->name('classer.reenoll');
        Route::get('/classer/ended', 'Admin\ClasserController@ended')->name('classer.ended');
        Route::get('/classer/postponed', 'Admin\ClasserController@postponed')->name('classer.postponed');
        Route::post('/classer/addsession', 'Admin\ClasserController@addsession')->name('classer.addsession');
        Route::post('/classer/deductsession', 'Admin\ClasserController@deductsession')->name('classer.deductsession');
        
        Route::get('/classer/postpone/', 'Admin\ClasserController@postpone_today')->name('classer.postpone');
        
        Route::put('/classer/postpone/{id}', 'Admin\ClasserController@postpone')->name('classer.postpone');
        Route::put('/classer/cancelpostpone/{id}', 'Admin\ClasserController@cancelPostpone')->name('classer.cancelpostpone');
        Route::put('/classer/editpostpone/', 'Admin\ClasserController@editpostpone')->name('classer.editpostpone');
        
        Route::post('/classer/submission', 'Admin\ClasserController@submission')->name('classer.submission');
        Route::post('/classer/cancelsubmission/{id}', 'Admin\ClasserController@cancelsubmission')->name('classer.cancelsubmission');
        
        Route::get('/classer/failedRequest', 'Admin\ClasserController@failedRequest')->name('classer.failedRequest');
        
        Route::get('/classer/requestSchedule/{id}', 'Admin\ClasserController@requestSchedule')->name('classer.requestSchedule');
        
        Route::post('/classer/changeDays/{id}', 'Admin\ClasserController@changeDays')->name('classer.changeDays');
        Route::post('/classer/changetime/{id}', 'Admin\ClasserController@changetime')->name('classer.changetime');
        Route::post('/classer/changestartdate/{id}', 'Admin\ClasserController@changestartdate')->name('classer.changestartdate');
        
        Route::get('/classer/today', 'Admin\ClasserController@today')->name('classer.today');
        
        Route::get('/classer/new', 'Admin\ClasserController@getnew')->name('classer.new');
        Route::post('/classer/assign/{id}', 'Admin\ClasserController@assign')->name('classer.assign');
        Route::Resource('classer', 'Admin\ClasserController');
        
        // Route::put('classsession/update/{id}', 'Admin\ClassSessionController@update');
        Route::Resource('classsession', 'Admin\ClassSessionController');
        
        //leveltest
        Route::get('leveltest/new', 'Admin\LevelTestController@new')->name('leveltest.new');
        Route::post('leveltest/assign/', 'Admin\LevelTestController@assign')->name('leveltest.assign');
        Route::Resource('leveltest', 'Admin\LevelTestController');
        
        //for filmanager uploader
        Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
        
        Route::get('notifications', 'Admin\NotificationController@index');
        Route::delete('notifications', 'Admin\NotificationController@delete')->name('notification.destroy');
        
        //Setting
        Route::get('setting/system', 'Admin\SettingController@system')->name('setting.system');
        Route::post('setting/system', 'Admin\SettingController@updatesystem')->name('setting.system.update');

        Route::get('setting/video', 'Admin\SettingController@video')->name('setting.video');

        Route::get('setting/queuing', 'Admin\SettingController@queuing')->name('setting.queuing');
        Route::get('setting/queuingstart', 'Admin\SettingController@queuingstart')->name('setting.queuingstart');

        Route::get('setting/payment', 'Admin\SettingController@payment')->name('setting.payment');

        Route::get('setting/general', 'Admin\SettingController@general')->name('setting.general');

        Route::get('setting/notification', 'Admin\SettingController@notification')->name('setting.notification');

        Route::get('setting/sample', 'Admin\SettingController@index')->name('setting.sample');
        Route::post('setting/store', 'Admin\SettingController@store')->name('setting.store');


        //profile
         Route::get('profile/change', 'Admin\ProfileController@changePassword')->name('profile.changepassword');
        Route::post('profile/change', 'Admin\ProfileController@validatePassword')->name('profile.savepassword');
        Route::resource('profile', 'Admin\ProfileController');

        Route::resource('popup', 'Admin\PopUpController');

        //contents
        Route::post('testimonial/reply', 'Admin\TestimonialController@reply')->name('testimonial.reply');
        Route::Resource('testimonial', 'Admin\TestimonialController');

        Route::get('blog/totop/{id}', 'Admin\BlogController@updateTop')->name('blog.totop');
        Route::Resource('blog', 'Admin\BlogController');
        Route::Resource('faq', 'Admin\FaqController');
        Route::post('inquiry/reply', 'Admin\InquiryController@reply')->name('inquiry.reply');
      
        Route::Resource('inquiry', 'Admin\InquiryController');
        Route::Resource('comment', 'Admin\CommentController');


        /*
         * for badges
         *
        */
        
        //get new class 
        Route::get('get_new_class', function(){
            return get_new_class();
        });


        //get new leveltest
        Route::get('get_new_leveltest', function(){
            return get_new_leveltest();
        });

        //failed Braincert Request
        Route::get('failedBraincertRequest', function(){
            return failedBraincertRequest();
        });

        Route::get('getclass', 'Admin\NotificationController@getClass');
        Route::get('getpostponed', 'Admin\NotificationController@getPostponedClass');
        Route::get('getclassgeneral', 'Admin\NotificationController@getclassgeneral');

        Route::get('getleveltest', 'Admin\NotificationController@getLevelTest');
        Route::get('getleveltestoverall', 'Admin\NotificationController@getLevelTestOverAll');
        Route::get('getleveltestpending', 'Admin\NotificationController@newLeveltestpending');
        
        Route::get('getproofreading', 'Admin\NotificationController@getProofReading');
        Route::get('getunrepliedproofReading', 'Admin\NotificationController@getUnrepliedProofReading');
        Route::get('getinquiry', 'Admin\NotificationController@getInquiry');
        Route::get('gettestimonial', 'Admin\NotificationController@getTestimonial');

});


//Teachers Routes
Route::group(array('prefix' => 'teacher', 'as' => 'teacher.', 'middleware' => ['auth:admin', 'teacher', 'notiautodelete']), function(){
        Route::post('api/updatebook', 'API\BookApiController@updateClassBook');
        Route::get('api/notification', 'API\Teacher\NotificationApiController@get_latest');    
        Route::get('api/unreadnotification', 'API\Teacher\NotificationApiController@get_unread');   

        Route::get('notifications', 'Teacher\NotificationController@index');
        Route::delete('notifications', 'Teacher\NotificationController@delete')->name('notification.destroy');


        //for session correction
        Route::get('api/session/correction/all/{id}', 'API\Teacher\SessionController@all');
        Route::post('api/session/correction/store', 'API\Teacher\SessionController@store');
        Route::put('api/session/correction/update', 'API\Teacher\SessionController@update');
        Route::post('api/session/correction/delete/{id}', 'API\Teacher\SessionController@destroy');

        Route::get('dashboard', 'Teacher\DashboardController@index')->name('dashboard');
        //Route::Resource('teacher', 'Teacher\TeacherController');
        Route::Resource('student', 'Teacher\StudentController');
        Route::post('leveltest/{id}/mistake', 'Teacher\LevelTestController@addMistake')->name('leveltest.addmistake');
        Route::delete('leveltest/{id}/delete', 'Teacher\LevelTestController@deleteMistake')->name('leveltest.deletemistake');
        Route::Resource('leveltest', 'Teacher\LevelTestController');
        //Route::Resource('course', 'Teacher\CourseController');
        //Route::Resource('coursetype', 'Teacher\CourseTypeController');
        Route::Resource('holiday', 'Teacher\HolidayController');
        Route::Resource('book', 'Teacher\BookController');
        Route::Resource('notice', 'Teacher\NoticeController');
        Route::get('session/calendar', 'Teacher\SessionController@calendar')->name('calendar');
        Route::post('session/mistake', 'Teacher\SessionController@saveMistake')->name('session.mistake');
        Route::post('session/deletemistake/{id}', 'Teacher\SessionController@deleteMistake')->name('session.deletemistake');
        Route::get('session/today', 'Teacher\SessionController@today')->name('session.today');
        Route::Resource('session', 'Teacher\SessionController');
        Route::Resource('subclass', 'Teacher\SubClassController');

        Route::put('classer/changebook', 'Teacher\ClasserController@changebook')->name('classer.changebook');
        Route::Resource('classer', 'Teacher\ClasserController');

        Route::get('profile/change', 'Teacher\ProfileController@changePassword')->name('profile.changepassword');
        Route::post('profile/change', 'Teacher\ProfileController@validatePassword')->name('profile.savepassword');
        Route::resource('profile', 'Teacher\ProfileController');
        Route::resource('comment', 'Teacher\CommentController');
        Route::resource('proofreading', 'Teacher\ProofReadingController');
        Route::resource('message', 'Teacher\MessageController');


        //
        Route::get('get_sub_class', 'Teacher\NotificationController@getSubClass');
        Route::get('get_new_class', 'Teacher\NotificationController@getNewClass');
        Route::get('get_leveltest', 'Teacher\NotificationController@getLevelTest');
        Route::get('get_proofreading', 'Teacher\NotificationController@getProofReading');
        Route::get('get_message', 'Teacher\NotificationController@getMessage');
        
});





Route::group(array('prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']), function(){
        Route::post('api/class/{id}', 'API\Student\ClassApiController@info');
        Route::post('api/sessions/{id}/{per_page}', 'API\Student\ClassApiController@sessions');
        Route::post('api/classsessions/{id}', 'API\Student\ClassApiController@classsessions');
        Route::post('api/postponed/{id}', 'API\Student\ClassApiController@postponed');

    
        Route::get('/', 'Student\DashboardController@index')->name('dashboard');

        Route::put('classer/postpone/{id}', 'Student\ClassController@postpone')->name('classer.postpone');
        Route::post('classer/cancelpostpone/{id}', 'Student\ClassController@cancelPostpone')->name('classer.cancelpostpone');

        Route::get('dashboard/class/{id}?session={session_id}', 'Student\ClassController@show')->name('class.session');

        Route::Resource('class', 'Student\ClassController');
        Route::Resource('calendar', 'Student\CalendarController');
        Route::Resource('book', 'Student\BookController');


        Route::post('rating/index', 'Student\RatingController@index')->name('rating.index');
        Route::get('rating/year', 'Student\RatingController@year')->name('rating.year');
        Route::Resource('rating', 'Student\RatingController');

        Route::get('profile/change', 'Student\ProfileController@changePassword')->name('profile.changepassword');
        Route::post('profile/change', 'Student\ProfileController@validatePassword')->name('profile.savepassword');
        Route::post('deleteaccount', 'Student\ProfileController@deleteaccount')->name('deleteaccount');
        Route::Resource('profile', 'Student\ProfileController');
        Route::Resource('testimonial', 'Student\TestimonialController');

        Route::post('message/reply', 'Student\MessageController@reply')->name('message.reply');
        Route::Resource('message', 'Student\MessageController');

        Route::Resource('proofreading', 'Student\ProofReadingController');

        Route::get('certificate', 'Student\CertificateController@index')->name('certificate.index');
        Route::get('certificate/{id}', 'Student\CertificateController@show')->name('certificate.show');
        
});

//image profile
Route::get('file/image/{filename}', function ($filename)
{
    $path = storage_path('public/profile' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

//image profile
Route::get('file/image/{filename}', function ($filename)
{
    $path = storage_path('public/profile' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});



// Localization
Route::get('/js/lang.js', function () {
     $strings = Cache::rememberForever('lang.js', function () {
         $lang = config('app.locale');

         $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');




Route::get('storage/curriculum/{filename}', function ($filename)
{
    $path = storage_path('public/curriculum/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('storage/banners/{filename}', function ($filename)
{
    $path = storage_path('public/banners/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
