<?php

namespace SevenLab\RemoteLogging\Channels;

use Illuminate\Notifications\Notification;

class RemoteLoggingChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toDashboard($notifiable);
        if (app()->bound('remote-logging')) {
            app('remote-logging')->sendFaildJob($data);
        }
    }
}