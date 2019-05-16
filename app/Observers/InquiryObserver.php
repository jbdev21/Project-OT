<?php
namespace App\Observers;

use App\Inquiry;
use App\Notifications\Admin\NewInquiryNotification;
use App\Admin;

class InquiryObserver
{
    public function created(Inquiry $Inquiry){
        $admins = Admin::where('type', 'administrator')->get();

        foreach($admins as $admin)
        {
            $admin->notify(new NewInquiryNotification($Inquiry));
        }
    }
}