<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function sendmessage(Request $request)
    {
        $userID = $request->session()->get('user_id');
        $role =  $request->session()->get('user_role');
        $username = "";
        if(strtolower($role) == 'admin'){
            Chat::create([
                'from' => $userID,
                'message' => $request->message,
                'to' => $request->to,
            ]);
            $username = "Admin";
        }else{
            Chat::create([
                'from' => $userID,
                'message' => $request->message,
                'to' => 1,
            ]);
            $username = $request->session()->get('user_name');
        }
        event(new ChatMessageEvent($request->message, ['username' => $username, 'role' => $role]));
        return view('chat');
    }
    public function chat()
    {
        return view('chat');
    }
    public function chats()
    {
        //this return username and last message
        $chats = DB::table('chats as c1')
            ->select('c1.from', 'c1.message', 'c1.created_at', 'fromUser.name as from_name', 'toUser.name as to_name')
            ->join(DB::raw('(SELECT `from`, MAX(created_at) AS latest_created_at
                              FROM chats
                              WHERE `to` = "1"
                              GROUP BY `from`) as c2'), function ($join) {
                $join->on('c1.from', '=', 'c2.from');
                $join->on('c1.created_at', '=', 'c2.latest_created_at');
            })
            ->join('users as fromUser', 'c1.from', '=', 'fromUser.id')
            ->join('users as toUser', 'c1.to', '=', 'toUser.id')
            ->where('c1.to', '1')
            ->get();
        return view('chats', compact('chats'));
    }
    public function messages(Request $request)
    {
        //this return all messages for one user and admin
        $user = $request->query("user");
        $messages = Chat::where('from', $user)
        ->orWhere('to', $user)
        ->with(['fromUserDatabase', 'fromUserDatabase'])
        ->get();
        return json_encode($messages);
    }

}