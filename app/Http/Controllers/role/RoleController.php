<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function role()
    {
        $roleData['view']=Role::all();
        $permissionData['viewPermission']=Permission::all();
        return view('role.role',$roleData,$permissionData);
    }
    function permission()
    {
        $permissionData['view']=Permission::paginate(15);
        return view('permission.permission',$permissionData);
    }
    function roleView($id)
    {
        $user=Role::find($id);
        $roleData=$user->permissions->pluck('name');
        return view('role.roleshow',compact('user','roleData'));
    }
    function userRegistration()
    {
           $userData=User::all();
           return view('role.userregister',compact('userData'));
    }
    function roleAdd(Request $request)
    {
        $roleData=new Role();
        $roleData->name=$request->name;
        $roleData->guard_name='web';
        $roleData->save();
        $roleData->syncPermissions($request->permission);
        return redirect()->route('user.role');
    }
    function roleDelete(Request $request,$id)
    {

            Role::where('id',$id)->delete();
            return redirect()->route('user.role');
    }
    function roleEdit($id)
    {
        $user=Role::find($id);
        $roleData=$user->permissions->pluck('id')->toArray();
        $viewPermission=Permission::all();
        return view('role.edit',compact('viewPermission','user','roleData'));
    }
    function roleUpdate(Request $request)
    {
        $user=Role::findorFail($request->id);
        $user->name=$request->name;
        $user->guard_name='web';
        $user->update();
        $user->permissions()->sync($request->input('permission'));
        return redirect()->route('user.role');
    }
    function permissionAdd(Request $request)
    {
        $roleData=new Permission();
        $roleData->name=$request->name;
        $roleData->guard_name='web';
        $roleData->save();
        return redirect()->route('user.permission');
    }
    function permissionDelete($id)
    {
        Permission::where('id',$id)->delete();
        return redirect()->route('user.permission');

    }
    function permissionEdit(Request $request)
    {
        $editData['view']=Permission::find($request->id);

        return response()->json($editData);

    }
    function permissionUpdate(Request $request)
    {
        $data=Permission::findorFail($request->id);
        $data->name=$request->name;
        $data->guard_name='web';
        $data->update();
        return redirect()->route('user.permission');
    }
    function editPermission($id)
    {
            $viewRole=Role::all();
            $userData=User::find($id);
            return view('role.editpermission',compact('viewRole','userData'));
    }
    function updatePermission(Request $request)
    {
        $input=$request->all();
        $user=User::find($request->id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$request->id)->delete();

        $user->assignRole($request->input('role'));

        return redirect()->route('user.user-registration');
    }
    function userRegisterShow($id)
    {
        $userData=User::find($id);
        $a=$userData->roles[0]->id;
        $user=Role::find($a);
        $user2=$user->permissions;
        return view('role.userregistershow',compact('userData','user2'));
    }
}
