<?php
namespace App\Observers;

use App\User;
use App\Admin;
use App\Notifications\Admin\NewStudentCreated;

class UserObserver
{
    public function created(User $student){
        
        $admins = Admin::where('type', 'administrator')->get();
     
        foreach($admins as $admin)
        {
            $admin->notify(new NewStudentCreated($student));
        }
       

       
    }
}