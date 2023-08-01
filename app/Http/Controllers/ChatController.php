<?php

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;

class ChatController extends Controller
{
 
    public function index()
    {
        return view('chat');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();
        $message= $request->get('message');
        return view('broadcast',compact('message'));
    }

    public function receive(Request $request)
    {
        $message= $request->get('message');
        return view('chat',compact('message'));
    }
}
