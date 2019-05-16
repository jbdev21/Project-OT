<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Classer;
use App\Inquiry;
use App\Message;
use App\LevelTest;
use App\Testimonial;
use App\ProofReading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    
    protected $admin;

    function index(){
        $notifications =  Auth::user()->notifications()->paginate(15);
        return view('admin.notification.index', compact('notifications'));
    }

    function delete(Request $request)
    {
        foreach($request->notifications as $notification)
        {
            Auth::user()->notifications()->where('id', $notification)->delete();
        }

        return back();
    }

    function all()
    {
    	return Auth::user()->notifications;
    }


    //new class
    function getClass()
    {
        return Classer::where('status', 'pending')->count();
        //return Auth::user()->unreadnotifications()->where('type', 'App\Notifications\Admin\NewClassNotification')->count();
    }

    function getclassgeneral()
    {
        $count = 0;
        $count += Classer::where('status', 'pending')->count();
        $count += Auth::user()->unreadnotifications()->where('type', 'App\Notifications\Admin\PostponedClassNotification')->count();
        return $count;
    }

    
    function getPostponedClass()
    {
        return Auth::user()->unreadnotifications()->where('type', 'App\Notifications\Admin\PostponedClassNotification')->count();
    }

    function getMessage()
    {       
        return Message::doesntHave('replies')->where('admin_id', Auth::user()->id)->count();
    }

    //new leveltest
    function getLevelTest()
    {
        return LevelTest::where('admin_id', NULL)->count();
        return Auth::user()->unreadnotifications()->where('type', 'App\Notifications\Admin\NewLeveltestNotification')->count();
    }

    function getLevelTestOverAll()
    {
        return Auth::user()->unreadnotifications()->where('type', 'App\Notifications\Admin\NewLeveltestNotification')->count() + $this->newLeveltestpending() + $this->getLevelTest();
    }

    function newLeveltestpending()
    {
        return LevelTest::where('status', 'pending')->where('is_new', 0)->count();
    }

    //new proofreading
    function getProofReading()
    {
        return ProofReading::doesntHave('admin')->count();
    }
    
    function getUnrepliedProofReading()
    {
        return ProofReading::doesntHave('replies')->count();
    }


    //new inquiry
    function getInquiry()
    {
        return 0;
        return Inquiry::doesntHave('replies')->count();
    }

    function getTestimonial()
    {
        $count = 0;
        $count += Testimonial::doesntHave('replies')->count();
        // return $count;
        return 0;
    }

    
}
