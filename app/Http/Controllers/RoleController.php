<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles' ,'permissions')->get();
        $roles = Role::all(); // Fetch all available roles
        $permissions = Permission::all(); // Fetch all permissions


        return view('roles.index', ['users' => $users, 'roles' => $roles ]);
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Validate the request
        $request->validate([
            'role' => 'required|exists:roles,name', // Validate that the role exists
        ]);

        // Sync the selected role with the user (remove old roles and assign the new one)
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'Role updated successfully.');
    }
    public function permissionsIndex()
    {
        // Fetch all roles and their associated permissions
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all(); // Fetch all available permissions

        return view('roles.setting-admin', ['roles' => $roles, 'permissions' => $permissions]);
    }


    public function assignPermissions()
    {
        $roles = Role::all(); // Fetch all roles
        $permissions = Permission::all(); // Fetch all permissions

        return view('roles.assign_permissions', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function updatePermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        // Validate permissions input
        $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // Sync the selected permissions with the role
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
