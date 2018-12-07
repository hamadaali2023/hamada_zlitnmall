<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;
use App\ Role;


class userController extends Controller
{
   


   
    public function interface()
    {
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        return view('account.pages.Interface',compact('users','products'));
    }
  


    public function AccessDenied()
    {
        $AdminRoleID=DB::table('roles')->where('name','Admin')->first();
        $roleAdmin=DB::table('role_user')->where('role_id',$AdminRoleID->id)->first();
        $user=DB::table('users')->where('id',$roleAdmin->user_id)->first();
        return view('account.pages.lockscreen',compact('user'));
    }

    

    public function showAdminlogin()
    {
        return view('account.pages.login');
    }
    public function Adminlogin(request $request)
    {
        if(!  auth()->attempt(Request(['email', 'password'])))  
       {
        return back()->withErrors(
            [
                'massage'=>'Invaled Username Or Password'
            ]
            );
        }
        
        return redirect('/ssss');

    }
    public function chickpassword(Request $Request)
    {
        $user = User::find($Request->user_id);

        if(Hash::check($Request->Admin_password, $user->password))
        {
            auth()->login($user);
            return redirect('/ssss');
        }
        else
        {
            return back()->withErrors(
                [
                    'massage'=>'Invaled  Password'
                ]
                );
        }

    }
    public function AdminLogOut()
    {
        auth()->logout();
       
        
        return redirect('/AccessDenied');

    }
    public function Adminprofile()
    {
        return view('account.pages.profile');
    }

    /*--------User Controls-----*/

    public function CreateUser(){
        $users=User::all();
        $Roles=Role::all();
        // $stop_rigister=DB::table('settings')->where('name','stop_rigister')->value('value');
        return view('account.pages.users',compact('users','Roles'));
    }
    
    public function storeuser(Request $Request){
        

        $users=new User();
        $users->name=$Request->user_name;
        $users->email=$Request->user_email;
        $users->password=bcrypt( $Request->user_password) ;
        
        $Iamge_name=time()."-".$Request->user_url->getClientOriginalExtension();
        $users->url=$Iamge_name;
        $users->save();

        $Request->user_url->move(Public_path('Upload'),$Iamge_name);
        // Add To Him Role User 
        $users->attachRole(Role::where('name','User')->first());
        //login user 
         auth()->login($users); 
        return redirect('/Admin/user');
    }
    public function DeleteUser($id)
    {
        $userToDelete=User::find($id);
        $userToDelete->delete();
        return back();

    }

    public function UpdateUser($id)
    {
        $user=User::find($id);
        
        return view('account.pages.updateuser',compact('user'));


    }
    
    public function userUpdate(Request $Request)
    {
        $user=User::find($Request->user_id);
        $user->name=$Request->user_name;
        $user->email=$Request->user_email;
        $user->password=bcrypt( $Request->user_password) ;
        if($Request->hasFile('image'))
        {
            $Iamge_name=time()."-".$Request->user_url->getClientOriginalExtension();
            $user->url=$Iamge_name;
            $Request->user_url->move(Public_path('Upload'),$Iamge_name);
        }
        $user->save();
        return redirect('/Admin/user');

    }

    public function userRoleUpdate(Request $Request,$id)
    {
        $user=User::find($id);
        $Roles=$Request->role;
        DB::table('role_user')->where('user_id',$id)->delete();
        foreach ($Roles as  $Role) {
            $user->attachRole($Role);
           
        }
        return back();
        



    }

     /*-------- End User Controls-----*/


    public function testapi()
    {
        return json_encode(['massage'=>'my first api']);
    }

    
}
