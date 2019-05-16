<?php
namespace App\Observers;

use App\ProofReading;
use App\Notifications\Admin\NewProofReadingNotification;
use App\Admin;

class ProofReadingObserver
{
    public function created(ProofReading $ProofReading){
        $admins = Admin::where('type', 'administrator')->get();

        foreach($admins as $admin)
        {
            $admin->notify(new NewProofReadingNotification($ProofReading));
        }
    }
}