<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        $permissions = Permission::where('guard_name', 'admin')->get();

        return view('admin.roles-permissions.index', compact('roles', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        return back()->with('success', 'Role created successfully!');
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role deleted successfully!');
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name, 'guard_name' => 'admin']);

        return back()->with('success', 'Permission created successfully!');
    }

    public function deletePermission(Permission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Permission deleted successfully!');
    }

    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
        ]);

        $role->syncPermissions($request->permissions);
        
        return back()->with('success', 'Permissions assigned successfully!');
    }
}
