<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    public function sendMessage( $event ) 
    {
        return OneSignalMessage::create()
            ->subject( "Your email was" . $event->event )
            ->body("Click here to see details.")
            ->webButton(
                OneSignalWebButton::create('link-1')
                    ->text('Click here')
                    ->icon('http://via.placeholder.com/192x192')
                    ->url('http://laravel.com')
            );
    }
}
