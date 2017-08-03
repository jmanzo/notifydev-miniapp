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
            $this->createEvent ( $data );
            $notifiable = new NotificationController;
            $notifiable->sendMessage($data);
        }
    	return response()->json($request->all());
    }

    private function createBounce ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'status'		=> $data['status'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'reason'		=> $data['reason'],
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createClick ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'useragent'		=> $data['useragent'],
    		'ip'			=> $data['ip'],
    		'url'			=> $data['url']
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createDeferred ($data)
    {
    	$event = Event::create([
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'sg_event_id'   => $data['sg_event_id'],
            'event'         => $data['event'],
            'sg_message_id' => $data['sg_message_id'],
            'response'      => $data['response'],
            'attempt'       => $data['attempt'],
    		'provider_id' 	=> 1
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createDelivered ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'response'		=> $data['response'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createDropped ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'reason'		=> $data['reason'],
            'status'        => $data['status'],
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createOpen ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'useragent'		=> $data['useragent'],
            'ip'            => $data['ip'],
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createProcessed ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id']
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createSpamReport ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
            'email'         => $data['email'],
            'smtp-id'       => $data['smtp-id'],
            'event'         => $data['event'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createEvent ($data)
    {
    	switch ( $data['event'] ) {
    		case 'bounce':
    			$this->createBounce($data);
    			break;

    		case 'click':
    			$this->createClick($data);
    			break;

    		case 'deferred':
    			$this->createDeferred($data);
    			break;

    		case 'delivered':
    			$this->createDelivered($data);
    			break;

    		case 'dropped':
    			$this->createDropped($data);
    			break;

    		case 'open':
    			$this->createOpen($data);
    			break;

    		case 'processed':
    			$this->createProcessed($data);
    			break;

    		case 'spamreport':
    			$this->createSpamReport($data);
    			break;
    	}
    }
}
