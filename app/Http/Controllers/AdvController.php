<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Banner;
use Auth;
use App\Devices;
// use Symfony\Component\HttpFoundation\Request;
use App\Traits\PushNotificationsTrait;

use App\User;
class AdvController extends Controller
{
    use PushNotificationsTrait;

    public function delete($id)
    {
        Banner::where('id',$id)->delete();
        return back();
    }
    
    public function show()
    {
        $banners = DB::table('banners')->get();
        return view('admin.banner.banner',compact('banners'));
    }

    public function edit($id)
    {
        $edit = Banner::findOrFail($id);
        return view('admin.banner.banner_edit',compact('edit'));
    }
    public function create()
    {
        return view('admin.banner.banner_create');
    }

    public function createAdv(Request $request)
    {
        // 
         $this->validate( $request,
            [  
                'image'=>'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:1024',
            ]

        );
        
        // 
         $banner_edit=new Banner();
         $banner_edit->title  = $request->title;
         $banner_edit->dis  = $request->dis;
         $banner_edit->file_type=$request->image->getClientMimeType();


         $image_banner=$request->image;
        if(isset($image_banner))
        {
            $image_banner=time().".".$request->image->getClientOriginalExtension();
            $request->image->move('upload/Adv',$image_banner);
            $banner_edit->image=$image_banner;
        }
        else
        {
            $banner_edit->image='null';

        }
          $banner_edit->save();
          $Devices=Devices::get();
        foreach($Devices as $Device)
        {
               //mob notification :)
               $token = $Device->Device_Token;
                        
               $title = "دليل صحيفة زلتين";
               $body =   "تم نشر أعلان جديد  ";
               $this->sendNotification($token , $title , $body);
        }
         return back()->with("message",  " تم أنشاء الأعلان بنجاح ");
    }

    public function update(Request $request, $id)
    {
        // 
         $this->validate( $request,
            [  

               
                'image'=>'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:1024',
            ]

        );
        
        // 
         $banner_edit=Banner::where('id',$id)->first();
         $banner_edit->title  = $request->title;
         $banner_edit->dis  = $request->dis;
         $banner_edit->file_type=$request->image->getClientMimeType();


         $image_banner=$request->image;
        if(isset($image_banner))
        {
            $image_banner=time().".".$request->image->getClientOriginalExtension();
            $request->image->move('upload/Adv',$image_banner);
            $banner_edit->image=$image_banner;
        }
        else
        {
            $banner_edit->image='null';

        }
          $banner_edit->save();
         return back()->with("message",  " تم التعديل بنجاح ");
    }
     

    // public function destroy(Aboutus $id)
    // {
    //     $id->delete();
    //     return back();
    // }


}