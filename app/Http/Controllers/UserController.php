<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Notifications\Notifiable;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkuser');
    }
    public function view()
    {
        $users = User::where('is_admin','!==',true)->get();
        
        return view('user.dashboard_user',compact('users'));
    }
    public function show($id){
        $user=auth()->user()->id;
        
        $getid = DB::table('notifications')->where('data->user_id',$id)->pluck('id');
        $read=DB::table('notifications')
        ->whereIn('id', $getid)
        ->update(['read_at'=>now()]);  
      

return redirect()->route('dashboard_user');
        
    }
    public function ReadAll(){
        $user = User::findorFail(auth()->user()->id);
        foreach($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect()->route('dashboard_user');

    }
}
