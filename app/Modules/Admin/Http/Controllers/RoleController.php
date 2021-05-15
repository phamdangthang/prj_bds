<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(Request $request) {
        $query = Role::query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $roles = $query->paginate(10);

        $viewData = [
            'roles' => $roles,
            'search' => $request->search,
        ];

        return view("admin::role.index", $viewData);
    }

    public function create() {
        $permissions = Permission::all();

        return view('admin::role.create', ['permissions'=>$permissions]);
    }

    public function store(Request $request) {
        try {
            $this->validate($request, [
                'name'=>'required|unique:roles|max:10',
                'permissions' =>'required',
                ]
            );
    
            $role = Role::create([
                'name' => $request->name
            ]);
            $data = $request->all();
            $permissions = $request['permissions'];
            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->first(); 
                $role->givePermissionTo($p);
            }
            return redirect()->route('admin.role.index')->with('alert-success','Create role success.');
        } catch (Exception $e) {
            return redirect()->back()->with('alert-danger', 'Create role failed.');
        }
    }

    public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin::role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id) {
        try {
            $role = Role::findOrFail($id);
            $this->validate($request, [
                'name'=>'required|max:10|unique:roles,name,'.$id,
                'permissions' =>'required',
            ]);

            $input = $request->except(['permissions']);
            $permissions = $request['permissions'];
            $role->fill($input)->save();

            $p_all = Permission::all();//Get all permissions

            foreach ($p_all as $p) {
                $role->revokePermissionTo($p); //Remove all permissions associated with role
            }

            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->firstOrFail();
                $role->givePermissionTo($p);  //Assign permission to role
            }

            return redirect()->route('admin.role.index')->with('alert-success','Update role success.');
        } catch (Exception $e) {
            return redirect()->back()->with('alert-danger','Update role failed.');
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.role.index')->with('alert-success','Delete role success.');
    }

    public function getAllRole() {
        $roles = Role::all();
        return $roles;
    }

    public function getPermissionOfRole(Request $request) {
        $data = $request->all();
        $arr = [];

        if(isset($data['roleId'])) {
            $id = $data['roleId'];
            foreach ($id as $value) {
                $arr = array_merge($arr, Role::find($value)->permissions->pluck('id')->toArray());
            }
            $arr = array_values(array_unique($arr));
        }
        
        return $arr;
    }
}
