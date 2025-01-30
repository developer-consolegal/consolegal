<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admins;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    public function index()
    {
        $admins = admins::all();
        $roles = Role::all();
        return view('admin.assign-role', compact('admins', 'roles'));
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'role' => 'required|exists:roles,name'
        ]);

        $admin = admins::findOrFail($request->admin_id);
        $admin->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'Role assigned successfully.');
    }
}
