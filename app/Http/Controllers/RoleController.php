<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use DB;
class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Roles=Role::all();
        $Permissions = DB::table('Permissions')
        ->orderBy('name', 'desc')  // You can pass as many columns as you required
        ->get();
        return view('account.pages.role',compact("Roles","Permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Role_Name Role_DisplayName Role_Descraption 

       // $Role=Role::create($request->except(['Role_Permissionsme','_token']));

        $Role=new Role();
        $Role->name=$request->Role_Name;
        $Role->display_name=$request->Role_DisplayName;
        $Role->description=$request->Role_Descraption;
        $Role->save();

        foreach ($request->Role_Permissionsme as $key => $value) {

            $Role->attachPermission($value);
            # code...
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Role=Role::find($id);
        $Permissions=Permission::all();
        $Role_Permissions=$Role->perms()->pluck('id','id')->toArray();
        return view('account.pages.UpdateRole',compact('Role','Permissions','Role_Permissions'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Role=Role::find($id);
        $Role->name=$request->Role_Name;
        $Role->display_name=$request->Role_DisplayName;
        $Role->description=$request->Role_Descraption;
        $Role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();

        if(isset($request->Role_Permissionsme))
        {

        foreach ($request->Role_Permissionsme as $key => $value) {

            $Role->attachPermission($value);
            # code...
        }
       }

        return redirect()->route('Role.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id',$id)->delete();
        return back();
    }
}
