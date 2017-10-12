<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;
use App\Argument;
use App\Category;
use App\Event;
use App\Offset;
use App\Provider;

class SendgridController extends Controller
{
    public function notifications (Request $request)
    {
    	$events = $request->all();

        foreach ( $events as $data ) {
            $asm_group_id   = isset($data['asm_group_id']) ? $data['asm_group_id'] : null;
            $response       = isset($data['response']) ? $data['response'] : null;
            $email          = $data['email'];
            $smtp_id        = isset($data['smtp-id']) ? $data['smtp-id'] : null;
            $data_event     = $data['event'];
            $ip             = isset($data['ip']) ? $data['ip'] : null;
            $tls            = isset($data['tls']) ? $data['tls'] : null;
            $cert_err       = isset($data['cert_err']) ? $data['cert_err'] : null;
            $useragent      = isset($data['useragent']) ? $data['useragent'] : null;
            $url            = isset($data['url']) ? $data['url'] : null;
            $type           = isset($data['type']) ? $data['type'] : null;
            $status         = isset($data['status']) ? $data['status'] : null;
            $sg_event_id    = $data['sg_event_id'];
            $sg_message_id  = $data['sg_message_id'];
            $reason         = isset($data['reason']) ? $data['reason'] : null;
            $category       = isset($data['category']) ? $data['category'] : null;
            $attempt        = isset($data['attempt']) ? $data['attempt'] : null;
            $sent_at        = isset($data['sent_at']) ? $data['sent_at'] : null;

            $flight = Event::updateOrCreate([
                    'smtp-id' => $data['smtp-id'], 
                    'sg_event_id' => $data['sg_event_id'],
                    'sg_message_id' => $data['sg_message_id']
                ], [
                    'provider_id'   => 1,
                    'asm_group_id'  => $asm_group_id,
                    'response'      => $response,
                    'email'         => $email,
                    'event'         => $data_event,
                    'ip'            => $ip,
                    'tls'           => $tls,
                    'cert_err'      => $cert_err,
                    'useragent'     => $useragent,
                    'url'           => $url,
                    'type'          => $type,
                    'status'        => $status,
                    'reason'        => $reason,
                    'category'      => $category,
                    'attempt'       => $attempt,
                    'sent_at'       => $sent_at,
                ]
            );
            \OneSignal::sendNotificationToAll(
                $data['event'],
                $url = null,
                $data = null, 
                $buttons = null, 
                $schedule = null
            );
        }
    	return response()->json($events);
    }
}
