<?php
namespace SevenLab\RemoteLogging\Notifications;

use Spatie\FailedJobMonitor\Notification;


class FailedJobNotification extends Notification
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDashboard($notifiable)
    {
        return [
            'exception_message' => $this->event->exception->getMessage(),
            'job_class' => $this->event->job->resolveName(),
            'job_body' => $this->event->job->getRawBody(),
            'exception' => $this->event->exception->getTraceAsString(),
        ];
    }
}