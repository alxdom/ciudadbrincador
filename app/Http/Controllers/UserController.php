<?php

namespace App\Http\Controllers;

use App\User;
use App\ParkPermisos\Models\Role;
use App\ParkPermisos\Models\Permission;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Gate::authorize('haveaccess','user.index');

        $users = User::with('roles')->orderBy('id', 'Desc')->paginate('20');
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', User::class);
        //return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show', 'userown.show']]);

        $roles = Role::orderBy('nombre')->get();
        
        return view('users.view', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);

        $roles = Role::orderBy('nombre')->get();
        
        

        return view('users.edit', compact('roles', 'user'));
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
       
        $request->validate([
            'name'        => 'required|unique:users,name,'.$user->id,
            'email'       => 'required|unique:users,email,'.$user->id,                      

        ]);
            
            $user->update($request->all());
            
            $user->roles()->sync($request->get('roles'));


            return redirect()
                    ->route('user.index')
                    ->with('status_success', 'El usuario se guardo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('haveaccess','user.destroy');

        $user->delete();

        return redirect()->route('user.index')->with('status_success', 'El usuario se eliminó correctamente');
        
    }
}

