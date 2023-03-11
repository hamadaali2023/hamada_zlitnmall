<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\city;
use App\product;
use App\product_section;
use DB;
use Auth;
use App\Shop;
use App\ Role;
use App\User;
use App\User_Role;

use Response;
use Carbon\Carbon;

class ShopApiController extends Controller
{
    private $ttl = 100160;
    // List Of All Shop
    public function list()
    {
        $output = array();
        // get all shop
        $allshops = Shop::with('category')->with('user')->with('city')->orderBy('id','DESC')->get();
        $FinalShopData=array();
        foreach($allshops as $i=>$Shop)
        {
            $Shop->shop_photo='http://istsher.com/Zlitn/shopPhoto/'.$Shop->shop_photo.'';
            $Shop->Business_Register=
            'http://istsher.com/Zlitn/shopfiles/'.$Shop->Business_Register.'';
            $FinalShopData[$i]=$Shop; 
        }
        

        
        if($FinalShopData)
        {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = $FinalShopData;
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 5000;
            $output['data'] = [];
        }
        return response()->json($output);
        //return $allLinks;
    
    }


    // Shop Owner Product
    public function OwnerProduct(Request $request)
    {

        if($request->has('ShopId') )
        {
            $ShopData=shop::where("id" , $request->ShopId)->first();
            if($ShopData)
            {
            
                $products=product::with('shop')->where('shop_id',$ShopData->id)->get();
                $FinalProduct=array();
                foreach($products as $i=>$product)
                {
                    $product->url='http://istsher.com/Zlitn/Upload/'.$product->url.'';
                    $FinalProduct[$i]=$product; 
                }

                $output['message'] = true;
                $output['code'] = 6000;
                $output['data'] = $FinalProduct;  
                
                
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 60012;
                $output['data'] = "لا يوجد هذا المحل ";
               

            }

        }

        else
        {

            $output['message'] = false;
            $output['code'] = 6000;
            $output['data'] = "توجد داتا ناقصة";
           

        }
        
            
        return response()->json($output);

    }

    // The Shop Home
    public function home(Request $requst)
    {
        // dd($requst);
        // reading a request header
        if($requst->has('shopId') )
        {
            $output = array();
            
            $Shop_id = $requst->shopId;
          
            $ShopData = Shop::where('id',$Shop_id)->with('category')->with('user')->with('city')->first();
            $Products = product::with('shop')->where('shop_id',$Shop_id)->where('Status','=','نشر')->get();
            // 
                $ShopData->shop_photo='http://homessegypt.com/ZlitnMallA/shopPhoto/'.$ShopData->shop_photo.'';
                $ShopData->Business_Register=
                'http://istsher.com/Zlitn/shopfiles/'.$ShopData->Business_Register.'';
                $FinalShopData=$ShopData; 
           
            
            // 
            $FinalProduct=array();
            foreach($Products as $i=>$product)
            {
                $product->url='http://istsher.com/Zlitn/public/Upload/'.$product->url.'';
                $FinalProduct[$i]=$product; 
            }
       
            if($FinalShopData)
            {
                $output['message'] = true;
                $output['code'] = 101;
                $output['ShopData'] = $FinalShopData;
                $output['Products'] = $FinalProduct; 
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 5000;
                $output['data'] = [];
                $output['Products']=[];
                
            }
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6000;
            $output['data'] = "يرجى أدخال المحل ";
            $output['Products']="يرجى أدخال المحل ";
            
           
        }

         return  response()->json($output);
    }
    // Create New Shop
    public function create(Request $request)
    {
        $output = array();
          
        //   $this->validate($request, [
        //     'shop_name' => 'required|unique:shop',
        //     'shop_address' => 'required',
        //     'shop_catogary' => 'required',
        //     'shop_city' => 'required',
        //     'user_id' => 'required',
        //     'shop_image' => 'image|mimes:jpeg,png,jpg',
        //     'shop_Bussnuss' => 'max:10000|mimes:doc,docx,jpeg,png,jpg',
            
        // ]);
        if(isset($request->shop_name)&&
        isset($request->shop_address)&&
        isset($request->shop_catogary)&&
        isset($request->shop_city)&&
        isset($request->user_id))
        {
        
            // check for cateogry existance
            $categoryData = Category::find($request->shop_catogary);
            $cityData = city::find($request->shop_city);
            $UserData = User::find($request->user_id);
            $shopData= Shop::where('user_id',$request->user_id)->first();
            if($shopData)
            {
                $output['message'] = false;
                $output['code'] = 6015;
                $output['data'] = "هذا المستخدم مسجل محل سابقا ";
                $response = Response::make($output, 400);

            }
            else
            {
                if($categoryData)
                {
                    if($cityData)
                    {

                        if($UserData)
                        {
                            if(isset($request->shop_image))
                            {
                                $Image=$request->shop_image;
                                $Iamge_name=time().".".$Image->getClientOriginalExtension();
                                $Image->move('shopPhoto',$Iamge_name);
                            }
                            else
                            {
                                $Iamge_name='';
                            }
                            // السجل التجارى 
                            if(isset($request->shop_Bussnuss))
                            {
                                $FileB=$request->shop_Bussnuss;
                                $Filename=time().".".$FileB->getClientOriginalExtension();
                                $FileB->move('shopfiles',$Filename);
                            }
                            else
                            {
                                $Filename='';
                            }
                            $ShopData=new shop();
                            $ShopData->shop_category  =$request->shop_catogary;
                            $ShopData->shop_city  =$request->shop_city;
                            $ShopData->shop_name  =$request->shop_name;
                            $ShopData->user_id  =$request->user_id;
                            $ShopData->shop_address  =$request->shop_address;
                            $ShopData->shop_photo=$Iamge_name;
                            $ShopData->Business_Register=$Filename;    
                            if($ShopData->save())
                            {
                                User_Role::where('user_id',$request->user_id)->update([
                                    'role_id'=>4
                                ]);
                                $output['message'] = true;
                                $output['code'] = 201;
                                $output['data'] = "New Shop added successfully";
                                $output['shop_id']=$ShopData->id;
                                $response = Response::make($output, 200);
                            }
                            else
                            {
                                $output['message'] = false;
                                $output['code'] = 210;
                                $output['data'] = "Cannot add now, try agin";
                                $response = Response::make($output, 200);
                            }

                        }
                        else
                        {
                            $output['message'] = false;
                            $output['code'] = 6008;
                            $output['data'] = "User  not found";
                            $response = Response::make($output, 400);

                        }

                    }
                    else
                    {
                        $output['message'] = false;
                        $output['code'] = 6008;
                        $output['data'] = "City not found";
                        $response = Response::make($output, 400);

                    }
                
                }
                else
                {
                    $output['message'] = false;
                    $output['code'] = 6008;
                    $output['data'] = "لا يوجد تصنيف بهذا الأسم";
                    $response = Response::make($output, 400);
                }

            }
            
        }
        else{
            $output['message'] = false;
                $output['code'] = 6015;
                $output['data'] = "توجد داتا ناقصة  ";
                $response = Response::make($output, 400);
            
        }
            
        
               //return response()->json($output);

         return $response->header('Content-Type','application/json');
    }
     //Read The Shop Details
    public function read(Request $requst)
    {
        // dd($requst);
        // reading a request header
        if($requst->has('shopId') )
        {
            $output = array();
            
            $Shop_id = $requst->shopId;
          
            $ShopData = Shop::where('id',$Shop_id)->with('category')->with('user')->with('city')->first();
            $ShopData->shop_photo='http://istsher.com/Zlitn/shopPhoto/'.$ShopData->shop_photo.'';
            $ShopData->Business_Register=
            'http://istsher.com/Zlitn/shopfiles/'.$ShopData->Business_Register.'';
            $FinalShopData=$ShopData;
            if($FinalShopData)
            {
                $output['message'] = true;
                $output['code'] = 101;
                $output['ShopData'] = $FinalShopData;   
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 5000;
                $output['data'] = [];
               
                
            }
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6000;
            $output['data'] = "Missing Input";
           
            
           
        }

         return  response()->json($output);
    }

    //Delete Shop But First You Shoud Be Login :)
    public function delete(Request $request)
    {
        if($request->has('ShopId') )
        {
            $ShopData=shop::where("id" , $request->ShopId)->first();
            if($ShopData)
            {
                if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                        $ShopId=$request->ShopId;
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        $ShopData=shop::where("id" , $ShopId)->first();
                        if($ShopData->user_id==$UserId->id)
                        {
                            
                            // check for token date
                            $isExpired = $this->validateAccessTokenTime($validateToken);
                        
                            if($isExpired == 1)
                            {
                                shop::where("id" , $ShopId)->delete();
                                product::where('shop_id',$ShopId)->delete();
                                $output['message'] = true;
                                $output['code'] = 6000;
                                $output['data'] = "The Shop delte Success";  
                                $response = Response::make($output, 200);
                                
                                
                            }
                            elseif($isExpired == 2)
                            {
                                
                                $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                $UserId->save();
                                shop::where("id" , $ShopId)->delete();
                                product::where('shop_id',$ShopId)->delete();
                                $output['message'] = true;
                                $output['code'] = 6000;
                                $output['data'] = "تم حذف المحل بنجاح";  
                                $response = Response::make($output, 200);



                            }
                            else
                            {
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "Invalid token";  
                                $response = Response::make($output, 401);
                            }

                        }
                        else
                        {
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "هذا المستخدم لا يستطيع مسح هذا المحل ";  
                                $response = Response::make($output, 401);

                        }
                    }
                    else
                    {
                        $output['message'] = false;
                        $output['code'] = 6000;
                        $output['data'] = "Invalid token";  
                        $response = Response::make($output, 401);
                    }
                }
                else
                {
                    $output['message'] = false;
                    $output['code'] = 6000;
                    $output['data'] = "يرجى إدخال  Access Token ";
                    
                    $response = Response::make($output, 400);
                }
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 60012;
                $output['data'] = "لا يوجد هذا المحل ";
                $response = Response::make($output, 400);

            }

        }

        else
        {

            $output['message'] = false;
            $output['code'] = 6000;
            $output['data'] = "توجد داتا ناقصة";
            $response = Response::make($output, 400);

        }
        
            
        return response()->json($output);
    }
     //function to validate access token
     private function validateAccessToken($access_token)
     {
         $tokenArray = explode(".", $access_token);
         $output = 0;
         if (count($tokenArray) == 3) {
             $secretKey = Config("app.key");
             $secretIv = Config("app.key");
             $encryptMethod = "AES-256-CBC";
             $signature = hash('sha256', $secretKey);
             $iv = substr(hash('sha256', $secretIv), 0, 16);
             if ($tokenArray[2] == $signature) {
                 $header = openssl_decrypt(base64_decode($tokenArray[0]), $encryptMethod, $signature, 0, $iv);
                 $header = json_decode($header);
                 if ((isset($header->alg) && $header->alg == "sha256") && (isset($header->typ) && $header->typ == "JWT")) {
                     
                     $payload = openssl_decrypt(base64_decode($tokenArray[1]), $encryptMethod, $signature, 0, $iv);
                     $payload = json_decode($payload);
                     if ( isset($payload->account_id) 
                         && isset($payload->user_email)
                         && isset($payload->user_name)
                         && isset($payload->creation_ttl_date) 
                         && isset($payload->expire_ttl_date) 
                         && isset($payload->creation_refrech_ttl_date) 
                         && isset($payload->expire_refrech_ttl_date) ) 
                     {   
                         $output = $payload;
                     }
                 }
             }
         }
         return $output;
     }
 
     // function to validate access token time
     public function validateAccessTokenTime($payload)
     {
         $output = 0;
         $dateNow = Carbon::now('UTC')->timestamp;
         if ($payload->creation_refrech_ttl_date == "" && $payload->expire_refrech_ttl_date == "") 
         {
             $creation_ttl_date = $payload->creation_ttl_date;
             $expire_ttl_date = $payload->expire_ttl_date;
             $expire_refresh_ttl_date = Carbon::createFromTimestampUTC($payload->creation_ttl_date)->timestamp;
             $expire_refresh_ttl_date = Carbon::createFromTimestampUTC($expire_refresh_ttl_date)->addMinutes(Config("config.refresh_ttl"))->timestamp;
         } 
         else 
         {
             $creation_ttl_date = $payload->creation_ttl_date;
             $expire_ttl_date = $payload->expire_ttl_date;
             $expire_refresh_ttl_date = $payload->expire_refrech_ttl_date;
         }
         if ($payload->expire_ttl_date > $dateNow) 
         {
             if ($expire_refresh_ttl_date > $dateNow) 
             {
                 //token is ok
                 $output = 1;
             } 
             else 
             {
                 //token need refresh
                 $output = 2;
             }
         } 
         else 
         {
             //token expired
             $output = 3;
         }
         return $output;
     }
 
     //function to generate refresh access token
     public function generateRefreshAccessToken($accountId, $email,$name)
     {
         $accessToken = "";
         $dateNow = Carbon::now('UTC')->timestamp;
         $secretKey = Config("app.key");
         $secretIv = Config("app.key");
         $encryptMethod = "AES-256-CBC";
         $signature = hash('sha256', $secretKey);
         $iv = substr(hash('sha256', $secretIv), 0, 16);
 
         $header = [
             "alg" => "sha256",
             "typ" => "JWT",
         ];
 
         $payload = [
            "account_id" => $accountId,
            "user_email" => $email,
            "user_name" => $name,
            "creation_ttl_date" => Carbon::now('UTC')->timestamp,
            "expire_ttl_date" => Carbon::now('UTC')->addMinute($this->ttl)->timestamp,
            "creation_refrech_ttl_date" => "",
            "expire_refrech_ttl_date" => "",
        ];
 
         $encryptedHeader = base64_encode(openssl_encrypt(json_encode($header), $encryptMethod, $signature, 0, $iv));
 
         $encryptedPayload = base64_encode(openssl_encrypt(json_encode($payload), $encryptMethod, $signature, 0, $iv));
         $accessToken = $encryptedHeader . "." . $encryptedPayload . "." . $signature;
         return $accessToken;
     }



}
