<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;
use Illuminate\Validation\Rule;
use App\Models\User;



class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $roles = Role::orderBy('id','DESC')->paginate(10);
        $roles = Role::orderBy('id','DESC')->get();
        // dd($roles);
        $role=$roles;
        return view('roles.index',compact('role'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // return $request;
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            // 'permission' => 'required',
        ]);

        $role= new Role();
        $role->name=$request->name;
        $role->save();
        return response()->json($role);
        
        $role = Role::create(['name' => $request->get('name')]);
        // $role->syncPermissions($request->get('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions;
    
        return view('roles.show', compact('role', 'rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $roleId)
    {
    
     return response()->json($roleId);

    //   return $roleId;


    //     $role = $roleId;
    //     $rolePermissions = $role->permissions->pluck('name')->toArray();
    //     $permissions = Permission::get();
    
    //     return view('roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        $request->validate([
            'name'=>'required|string|unique:roles,name,' . $request->id,
        ]);
            $role=Role::find($request->id);
            $role->name=$request->name;
            $role->status=$request->status;
            $role->save();
            return response()->json($role);

// return ($request);
       

        return response()->json($role);
        // $this->validate($request, [
        //     'name' => 'required',
        //     'permission' => 'required',
        // ]);
        
        // $role->update($request->only('name'));
    
        // $role->syncPermissions($request->get('permission'));
    
        // return redirect()->route('roles.index')
        //                 ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $deleteId)
    {

         // Delete the role
        //  $deleteId->delete();

        //  return response()->json(['message' => 'Role deleted successfully']);


        $roleId = $deleteId->id;
        $usersCount=User::where('primary_admin',$roleId)->count();

        // Check if there are any users associated with the role
        // $usersCount = User::whereHas('roles', function ($query) use ($roleId) {
        //     $query->where('primary_admin', $roleId);
        // })->count();
    
        if ($usersCount > 0) {
            // If there are users associated with the role, return an error response
            return response()->json(['message' => 'Cannot delete role. There are associated users.'], 422);
        }
         else
         {
            // If there are no associated users, delete the role
            Role::findOrFail($roleId)->delete();
                
            // Return a success response
            return response()->json(['message' => 'Role deleted successfully.'.$usersCount.'']);
         }
        
    }
}