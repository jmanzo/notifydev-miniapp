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
    		'provider_id' 	=> 1, // Only for test concept...
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
	    		'name'		=> $value
	    	]);
    	}
    	return true;
    }

    private function createEvent ($data)
    {
    	switch ( $data['event'] ) {
    		case 'bounce':
    			$this->createBounce($data);
    			break;

    		/*case 'click':
    			# code...
    			break;

    		case 'deferred':
    			# code...
    			break;

    		case 'delivered':
    			# code...
    			break;

    		case 'dropped':
    			# code...
    			break;

    		case 'open':
    			# code...
    			break;

    		case 'processed':
    			# code...
    			break;

    		case 'spamreport':
    			# code...
    			break;*/
    		
    		default:
    			abort(500);
    			break;
    	}
    }
}
