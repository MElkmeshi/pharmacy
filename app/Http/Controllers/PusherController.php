<?php

namespace App\Http\Controllers;

use App\Events\PusherBrodcast;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {

    }
    public function receive()
    {
    }
    public function test()
    {
        return view('test');
    }

    public function brodcast()
    {
        $message = "hi";
        broadcast(new PusherBrodcast($message))->toOthers();
    }
}
