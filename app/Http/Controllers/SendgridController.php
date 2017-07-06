<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Argument;
use App\Category;
use App\Event;
use App\Offset;
use App\Provider;

class SendgridController extends Controller
{

    public function notifications (Request $request)
    {
    	$data = $request->all();
    	$this->createEvent($data);
    	return response()->json($data);
    }

    private function createBounce ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
    		'status'		=> $data['status'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'asm_group_id'	=> $data['asm_group_id'],
    		'reason'		=> $data['reason'],
    		'type'			=> $data['type'],
    		'ip'			=> $data['ip'],
    		'tls'			=> $data['tls'],
    		'cert_err'		=> $data['cert_err']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'useragent'		=> $data['useragent'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'asm_group_id'	=> $data['asm_group_id'],
    		'ip'			=> $data['ip'],
    		'url'			=> $data['url']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
    	]);
    	$category = Category::create([
	    	'event_id' 	=> $event->id,
	    	'name'		=> $data['category']
	   	]);
    }

    private function createDeferred ($data)
    {
    	$event = Event::create([
    		'provider_id' 	=> 1,
    		'response'		=> $data['response'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'smtp-id'		=> $data['smtp-id'],
    		'attempt'		=> $data['attempt'],
    		'asm_group_id'	=> $data['asm_group_id'],
    		'ip'			=> $data['ip'],
    		'tls'			=> $data['tls'],
    		'cert_err'		=> $data['cert_err']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'response'		=> $data['response'],
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'smtp-id'		=> $data['smtp-id'],
    		'asm_group_id'	=> $data['asm_group_id'],
    		'ip'			=> $data['ip'],
    		'tls'			=> $data['tls'],
    		'cert_err'		=> $data['cert_err']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'smtp-id'		=> $data['smtp-id'],
    		'reason'		=> $data['reason']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'ip'			=> $data['ip'],
    		'useragent'		=> $data['useragent'],
    		'event'			=> $data['event'],
    		'smtp-id'		=> $data['smtp-id']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'useragent'		=> $data['useragent'],
    		'event'			=> $data['event'],
    		'smtp-id'		=> $data['smtp-id'],
    		'asm_group_id'	=> $data['asm_group_id']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		'sg_event_id' 	=> $data['sg_event_id'],
    		'sg_message_id' => $data['sg_message_id'],
    		'email' 		=> $data['email'],
    		'event'			=> $data['event'],
    		'asm_group_id'	=> $data['asm_group_id']
    	]);
    	$argument = Argument::create([
    		'event_id' 	=> $event->id,
    		'field'		=> 'unique_arg_key',
    		'value'		=> $data['unique_arg_key']
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
    		
    		/*default:
    			abort(500);
    			break;*/
    	}
    }
}
