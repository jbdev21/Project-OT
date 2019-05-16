<?php

use App\User;
use App\Admin;
use Illuminate\Http\Request;

///for reset password
Route::post('validateusername', 'API\Student\ResetPasswordController@validateUsername');
Route::post('savenewpassword', 'API\Student\ResetPasswordController@saveNewPassword');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('getstudents', function(){
	return  \App\User::all();
});

Route::get('getstudentjson', function(Request $request){

	$students = User::where("username", 'LIKE', '%' . $request->q . '%')->orWhere("korean_name", 'LIKE', '%' . $request->q .'%')->take(30)->get();

	$data = array();
    foreach($students as $student){
        array_push($data, [
            'id' => $student->id,
            'text' => $student->username . ': ' . $student->korean_name,
        ]);
    }
	return $data;
});

Route::get("getteacherjson", function(Request $request){
	$admins = Admin::where("username", 'LIKE', '%' . $request->q . '%')->orWhere("name", 'LIKE', '%' . $request->q .'%')->take(30)->get();

	$data = array();
    foreach($admins as $admin){
        array_push($data, [
            'id' => $admin->id,
            'text' => $admin->name,
        ]);
    }
	return $data;
});

Route::get('pagepreviews/{id}', function($id){
	$book = \App\Book::find($id);
	$pages = $book->page()->take(5)->get();
	return ['book' => $book, 'pages' => $pages];
});

Route::post('getteachers', function(){
	return  \App\Admin::where('type', 'teacher')->where("is_active", 1)->get();
});

Route::post('getcoursetypes', function(){
	return  \App\CourseType::all();
});

Route::get('validatemobile/{mobile}', function($mobile){
	return \App\LevelTest::where('mobile', $mobile)->count();
});		

Route::post('checkusername', function(Request $request) {
	$username = $request->username;
	if(\App\User::where('username', $username)->count()){
		return Response::JSON(404);
	}
	return Response::JSON(200);
})->name('api.checkusername');

Route::post('checkemail', function(Request $request) {
	$email = $request->email;
	if(\App\User::where('email', $email)->count()){
		return Response::JSON(404);
	}
	return Response::JSON(200);
})->name('api.checkemail');

Route::post('checkcontact_number', function(Request $request) {
	$contact_number = $request->contact_number;
	if(\App\User::where('contact_number', $contact_number)->count()){
		return Response::JSON(404);
	}
	return Response::JSON(200);
})->name('api.checkcontact_number');

Route::post('checkcontact_number1', function(Request $request) {
	$contact_number = $request->contact_number;
	if(\App\User::where('contact_number', $contact_number)->count()){
		return Response::JSON(404);
	}
	return Response::JSON(200);
})->name('api.checkcontact_number1');