<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:admin.dashboards.index', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $admins = User::where('role_id',1)->count();
        $visitors = User::where('role_id',2)->count();
        $roles = Role::count();
        $permissions = Permission::count();

        return view('admin.dashboard.index',compact([
            'admins' , 'visitors' , 'roles', 'permissions'
        ]))->with('i', ($request->input('page', 1) - 1) * 5);
    }


}
