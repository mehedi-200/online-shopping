<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Role_Has_Permission;
class RolePermissionController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'role_permission';
        $data['roles'] = Role::orderBy('id','desc')->get();
        return view('admin.setting.roles.index', $data);
    }
    public function create(Request $request)
    {
        $role_name = str_replace(' ','_',strtolower($request->name));
        if(Role::where('name', $role_name)->exists()){
            return redirect()->back()->withInput()->with('role_exists','Role name already exists');
        }
        $role = new Role();
        $role->name = $role_name;
        $role->display_name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        activity()->performedOn($role)->log('User ' . Auth()->user()->name . ' has created a new role .'.' '.$role->name);
        Toastr::success('Role name added Successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('role.index'));
    }
    public function SetPermission($role_id)
    {
        if(!Auth::user()->can('manage_roles')){
            Toastr::warning('You do not have permission to access this page.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        }
        $data['activeMenu'] = 'role_permission';
        $data['role'] = Role::find($role_id);
        $data['permissions'] = Permission::all();

        $data['permissionRole'] = DB::table('role_has_permissions')
            ->where('role_id', $role_id)
            ->select(DB::raw('CONCAT(role_id,"-",permission_id) AS detail'))
            ->pluck('detail')->toArray();



        return view('admin.setting.roles.permission',$data);
    }
    public function savePermissionForRole(Request $request, $role_id)
    {
        Role_Has_Permission::where('role_id', $role_id)->delete();
        $permissions = $request->permission;
        if(empty($permissions)){
            return redirect()->back()->withInput()->with('permission_error','Please select at least one permission');
        }

            foreach($permissions as $r_id => $permission){
                foreach($permission as $per_id => $per){
                    $value[] = $per_id;
                }
                if(count($value) > 0)
                {

                    for($x= 0;$x< count($value); $x++)
                    {
                        DB::table('role_has_permissions')->insert([
                            'role_id' => $r_id,
                            'permission_id' => $value[$x]
                        ]);

                    }
                }
            }
            unset($value);


        Artisan::call('cache:clear');

        Toastr::success('Permission successfully Saved', '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-bottom-right']);
        return redirect()->back();
    }

    public function delete($id)
    {
       $role= Role::find($id);
        Role::where('id',$id)->delete();
        activity()->performedOn($role)->log('User ' . Auth()->user()->name . ' has deleted a role .'.' '.$role->name);
        Toastr::error('Role name deleted', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
}
//DB::table('role_has_permissions')->where('role_id', $role_id)->delete();
//$permissions = $request->permission;
//
//if ($permissions)
//    foreach ($permissions as $r_key => $permission) {
//
//        foreach ($permission as $p_key => $per) {
//
//            $values[] = $p_key;
//        }
//
//        if (count($values))
//            for ($i = 0; $i < count($values); $i++)
//            {
//                DB::table('role_has_permissions')->insert([
//                    'permission_id' => $values[$i],
//                    'role_id' => $r_key
//                ]);
//            }
//        unset($values);
//    }
