<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\admins as Admin;

class PermissionController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $roles = Role::where('guard_name', 'admin')->get();
        $permissions = Permission::where('guard_name', 'admin')->get();

        return view('admin.permissions.index', compact('admins', 'roles', 'permissions'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'roles' => 'array',
            'permissions' => 'array'
        ]);

        $admin->syncRoles($request->roles);
        $admin->syncPermissions($request->permissions);

        return back()->with('success', 'Permissions updated successfully!');
    }
}

