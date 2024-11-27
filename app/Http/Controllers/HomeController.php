<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        $users = User::where('isRole',1)->get();
        return view('admin.user',compact('users'));
    }

    public function editUsers($id)
    {
        $user = User::find($id);
        return view('admin.edit',compact('user'));

    }

    public function updateUsers(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $user  = User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->save();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->with('error','Error While Updating User');
        }
        DB::commit();
        return redirect()->route('user')->with('success','User Updated Successfully!!');

    }

    public function deleteUsers($id)
    {
        DB::beginTransaction();
        try {
            $user  = User::find($id);
            $user->delete();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->with('error','Error While Deleting User');
        }
        DB::commit();
        return redirect()->back()->with('success','User Deleted Successfully!!');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function admin()
    {
        $properties = Property::count();
        $users = User::where('isRole',1)->count();
        return view('admin.index',compact('users','properties'));
    }
}
