<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UsersNotifications;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function index()
    {
        $users = User::where('is_admin', '!==', true)->get();
        // return $users;
        return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.AddUsers');
    }

    public function store(StoreRequest $request)
    {

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ]);


        $add = 'add';

        $user = User::where('id', '!=', auth()->user()->id, "and", "is_admin", false)->get();
        Notification::send($user, new UsersNotifications($users->id, $users->name, $add));

        return redirect()->route('dashboard.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {

        $users = User::find($id);
        if ($users) {
            return view('admin.EditUsers', compact('users'));
        } else {
            return response("this employeer is not exists");
        }
    }

    public function update(UpdateRequest $request, string $id)
    {
        $users = User::findorFail($id);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            // $request->all()

        ]);
        $status = 'update';

        $user = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($user, new UsersNotifications($users->id, $users->name, $status));




        return redirect()->route('dashboard.index');
    }

    public function destroy(string $id)
    {
        $users = User::find($id);
        User::destroy($id);
        $status = 'delete';

        $user = User::where('id', '!=', auth()->user()->id)->get();
        Notification::send($user, new UsersNotifications($users->id, $users->name, $status));
        return redirect()->route('dashboard.index');
    }
}
