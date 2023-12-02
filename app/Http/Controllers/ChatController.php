<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Models\Chat;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $touser = ($request->to) ? user::find($request->to) : user::find(1);
        event(new ChatMessageEvent($request->message, ['id'=> $userID, 'username' => $username, 'role' => $role], ['id'=>$touser->id , 'name'=>$touser->name]  ));
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
            error_log($chats);
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
    public function test()
    {
        // echo (new TesseractOCR('C:\\Users\\melkmeshi\\Documents\\Projects\\Laravel\\pharmacy\\test.jpg'))
        // ->run();
        // $role = Role::create(['name' => 'admin']);
        // error_log($role);
        // $permission = Permission::create(['name' => 'delete articles']);
        // error_log($permission);
        // return $role;
        $adminRole = Role::create(['name' => 'admin3']);
        $adminRole->givePermissionTo('delete articles');
        return $adminRole;
    }

}
