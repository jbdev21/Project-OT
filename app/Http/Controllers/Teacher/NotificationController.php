<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NotificationController extends Controller
{
    function index(){
        $notifications =  Auth::user()->notifications()->paginate(15);
        return view('teacher.notification.index', compact('notifications'));
    }

    function delete(Request $request)
    {
        foreach($request->notifications as $notification)
        {
            Auth::user()->notifications()->where('id', $notification)->delete();
        }

        return back();
    }
    
    function getSubClass()
    {
        $teacher = Auth::user();
        return $teacher->unreadnotifications()->where('type', 'App\Notifications\AssignSubClassNotification')->count();
    }

    function getNewClass()
    {
        $teacher = Auth::user();
        return $teacher->unreadnotifications()->where('type', 'App\Notifications\AssignClassNotification')->count();
    }

    function getLevelTest()
    {
        $teacher = Auth::user();
        $count =  $teacher->unreadnotifications()->where('type', 'App\Notifications\AssignLevelTestNotification')->count();
        
        return  $pending  = $teacher->leveltests()->where('status', 'pending')->count();
        return $count + $pending;

    }

    function getProofReading()
    {
        $teacher = Auth::user();
        return  $teacher->proofreading()->doesntHave('replies')->count();
       // return $teacher->unreadnotifications()->where('type', 'App\Notifications\AssignProofReadingNotification')->count();
    }

    function getMessage()
    {
        $teacher = Auth::user();
        return $teacher->unreadnotifications()->where('type', 'App\Notifications\MessageNotification')->count();
    }
}
