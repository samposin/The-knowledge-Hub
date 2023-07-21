<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Product;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status', 'active')->latest()->get();
        $projects = Product::where('status', 'active')->latest()->get(['id', 'name']);
        return view('admin.users.create', compact('roles', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
            'password' => 'required|confirmed|min:6',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $input = $request->except(['_token']);
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'public/images/users/';
            $userImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $userImage);
            $input['thumbnail'] = "$userImage";
        }
        $input['password'] = bcrypt($input['password']);
        unset($input['confirm_password']);
        
        $user = User::create($input);
        $user->assignRole($input['roles']);
        if(isset($input['projects'])){
            $user->products->attach($input['projects']);
        }
        return redirect()->route('admin.users.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name')->all();
        $projects = Product::where('status', 'active')->latest()->get(['id', 'name']);
        $userProjects = optional(optional($user->products)->pluck('name'))->all() ? $user->products->pluck('id')->all() : [];
        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'projects', 'userProjects'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'status' => 'required'
        ]);
  
        $input = $request->except(['_token']);
  
        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'public/images/users/';
            $old_file = $destinationPath.$input['old_thumbnail'];
            $thumbImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $thumbImage);
            $input['thumbnail'] = "$thumbImage";
            if($input['old_thumbnail'] != 'avatar.jpg')
            delete_file($old_file);
        }else{
            unset($input['thumbnail']);
        }
        unset($input['old_thumbnail']);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));
        DB::table('user_products')->where('user_id', $user->id)->delete();
        $user->products->attach($input['projects']);
        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->thumbnail != 'avatar.jpg')
        delete_file('public/images/users/'.$user->thumbnail);
        $user->delete();
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
}
