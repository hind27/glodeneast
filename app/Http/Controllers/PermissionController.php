<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{


    public function create()
    {
        return view('permissions.create'); // Form to create a permission
    }

    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'name' => 'required|unique:permissions,name|max:255',
        ]);

        // Create a new permission
        Permission::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Permission created successfully.');
    }
}
