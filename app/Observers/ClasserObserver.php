<?php
namespace App\Observers;

use App\Classer;
use App\Notifications\Admin\NewClassNotification;
use App\Notifications\Admin\NewReEnrollClassNotification;
use App\Admin;

class ClasserObserver
{
    public function created(Classer $class){
        
        $admins = Admin::where('type', 'administrator')->get();
        if($class->admin_id)
        {
            foreach($admins as $admin)
            {
                $admin->notify(new NewReEnrollClassNotification($class));
            }
        }else{
            foreach($admins as $admin)
            {
                $admin->notify(new NewClassNotification($class));
            }
        }

       
    }
}