<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkPermisos\Models\Role;
use App\ParkPermisos\Models\Permission;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','role.index');

        $roles = Role::orderBy('id', 'Desc')->paginate('20');

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','role.create');

        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
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
            'nombre'        => 'required|unique:roles,nombre',
            'descripcion'   => 'required',
            'slug'          => 'required|unique:roles,slug',
            'full-access'   => 'required|in:yes,no',
        ]);

        $role = Role::create($request->all());
        
            if ($request->get('permission')) {
                $role ->permissions()->sync($request->get('permission'));
            }
            return redirect()
                    ->route('roles.index')
                    ->with('status_success', 'El rol se guardo correctamente');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        Gate::authorize('haveaccess','role.show');

        $permission_role=[];
        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
            
        }
        
        $permissions = Permission::get();

        return view('roles.view', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('haveaccess','role.edit');

        $permission_role=[];
        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
            
        }
        
        $permissions = Permission::get();

        return view('roles.edit', compact('permissions', 'role', 'permission_role'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
       
        Gate::authorize('haveaccess','role.edit');
        $request->validate([
            'nombre'        => 'required|unique:roles,nombre,'.$role->id,
            'descripcion'   => 'required',                       
            'slug'          => 'required|unique:roles,slug,'.$role->id,
            'full-access'   => 'required|in:yes,no',
        ]);
            
            $role->update($request->all());
        
            //if ($request->get('permission')) {
            $role ->permissions()->sync($request->get('permission'));
            //}
            return redirect()
                    ->route('roles.index')
                    ->with('status_success', 'El rol se guardo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        
        Gate::authorize('haveaccess','role.destroy');
        $role->delete();

        return redirect()->route('roles.index')->with('status_success', 'El rol se eliminó correctamente');
    }
}
