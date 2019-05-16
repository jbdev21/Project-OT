<?php
namespace App\Observers;

use App\LevelTest;
use App\Notifications\Admin\NewLeveltestNotification;
use App\Admin;

class LevelTestObserver
{
    public function created(LevelTest $Leveltest){
        $admins = Admin::where('type', 'administrator')->get();

        foreach($admins as $admin)
        {
            $admin->notify(new NewLeveltestNotification($Leveltest));
        }
    }
}