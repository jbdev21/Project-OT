<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NotificationApiController extends Controller
{
    function get_latest(){
        return Auth::user()->notifications()->limit(7)->get();
    }

    function markall()
    {
        $all = Auth::user()->notifications;
        foreach($all as $notification)
        {
            $notification->markAsRead();
        }

        return 1;
    }

    function get_unread(Request $request){
        if($request->type){;
            $string_type = $this->types($request->type);
            return Auth::user()->unreadnotifications()->where('type', $string_type)->count();
        }else{
            return Auth::user()->unreadNotifications()->count();
        }
    }

    function types($type)
    {
        switch ($type) {
            case 'newclass':
                return "App\Notifications\Admin\NewClassNotification";
                break;
            case 'newinquiry':
                return "App\Notifications\Admin\NewInquiryNotification";
                break;
            case 'newleveltest':
                return "App\Notifications\Admin\NewLevelTestNotification";
                break;
            case 'newproofreading':
                return "App\Notifications\Admin\NewProofReadingNotification";
                break;
            case 'postponed':
                return "App\Notifications\Admin\PostponedNotification";
                break;
            
            default:
                # code...
                break;
        }

    }
}
