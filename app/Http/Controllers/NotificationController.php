<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function sendMessage( $content ) {
        $params = [
            'included_segments' => ['Active Users'],
            'excluded_segments' => ['Inactive Users'],
            'contents' => $content,
        ];
        \OneSignal::sendNotificationCustom( $params );
    }
}
