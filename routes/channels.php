<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Admin.{id}', function ($user, $parameter) {
    //Log::info(class_basename($user));  // local.INFO: Admin  
    return true;
});

Broadcast::channel('system', function($user){
    return $user;
});