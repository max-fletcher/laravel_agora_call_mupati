<?php

use Illuminate\Support\Facades\Broadcast;

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

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// We get to know online users by looking at who has subscribed to this channel on the front end. We return their ID and name.
Broadcast::channel('agora-online-channel', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
