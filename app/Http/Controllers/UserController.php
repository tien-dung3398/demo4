<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = Admin::query();
        // if ($request->ac && $request->ac == 'search') {
        //     $users = $query->where('name', 'LIKE', "%$request->text%")->where('id', '!=', 12)->get();
        // } else {
        $users = Admin::with('roles')->whereNotIn('id',[12])->get();
        $roles =Role::whereNotIn('id',[9] )->get();
        foreach($users as $val){
            foreach($val->roles as $role){
                $id[$val->id] =$role->id;
            }
        }
        return view('admin.users.allUser', compact('users','roles','id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::orderBy('id', 'DESC')->get();
        return view('admin.users.addUser', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        $user = new Admin;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($request->role);
        return redirect()->back()->with('mess', 'Thêm tài khoản thành công');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Admin::where('id', $request->id)->first();
        $user->roles()->detach();
        if ($request->author) {
            $user->roles()->attach(Role::where('id', $request->author)->first());
        }
        if ($request->admin) {
            $user->roles()->attach(Role::where('id', $request->admin)->first());
        }
        if ($request->user) {
            $user->roles()->attach(Role::where('id', $request->user)->first());
        }
        return redirect()->back()->with('mess', 'Thay đổi thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id == Auth::user()->id) {
            return redirect()->back()->with('mess', 'Bạn không được quyền xóa chính mình');
        }
        $user = Admin::query()->find($request->id);
        $user->roles()->detach();
        $user->destroy($request->id);
        return redirect()->back()->with('mess', 'Xóa tài khoản thành công');
    }
}
