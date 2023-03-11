<?php

namespace App\Http\Controllers;
use Response;
use Hash;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Shop;


use Illuminate\Http\Request;

class UserApiController extends Controller
{

    private $ttl = 100160;
     /*------------------Token_Device --------------------------------*/
public function Token_Device(Request $request)
{
    
        if($request->has('Token_Device'))
       
        {
            if($request->headers->has('accesstoken'))
            {
                $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                if($validateToken)
                {
                    $UserId = $validateToken->account_id;   

                    $isExpired = $this->validateAccessTokenTime($validateToken);
                    if($isExpired == 1)
                    {
                        $UserId=User::where('id',$UserId)->first();
                        $UserId->Device_Token=$request->Token_Device;
                     
                        if($UserId->save())
                        {
                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] = "تم حفظ  الجهاز بنجاح";  
                            $response = Response::make($output, 200);

                        }
                        else{
                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "المحاوله لاحقا";  
                            $response = Response::make($output, 401);
                        }
                        

                       
                    }
                    elseif($isExpired == 2)
                    {
                        $UserId=User::where('id',$UserId)->first();
                        $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                        $UserId->Device_Token=$request->Token_Device;                       
                        if($UserId->save())
                        {
                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] = "تم حفظ  بنجاح";  
                            $response = Response::make($output, 200);

                        }
                        else{
                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "المحاوله لاحقا";  
                            $response = Response::make($output, 401);
                        }
                        

                    }
                    else {
                        $output['message'] = false;
                        $output['code'] = 6000;
                        $output['data'] = "توكن غير صحيح ";  
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
            else {
                $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "يرجى تسجيل الدخول ";
                $response = Response::make($output, 400);
            }
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6001;
            $output['data'] = "يجب أرسال الجهاز ";
            $response = Response::make($output, 400);
            
        }
        return response()->json($output);

    

}
/*------------------Token_Device---------------------------------*/
    
    public function changepassword(Request $request)
    {
        
         if($request->has('newPassword') &&
             $request->has('password'))
        {
             if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                       
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        {
                            
                        }
                        elseif($isExpired == 2)
                        {
                            $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                            $UserId->save();
        
                         if(Hash::check($request->password , $UserId->password ))
                           {
                               $UserId->password = Hash::make($request->newPassword);
                                if($UserId->save())
                               {
                                $output['message'] = true;
                                $output['code'] = 6001;
                                $output['data'] = "تم تعديل الباسورد بنجاح  "; 
                                $response = Response::make($output, 200);
                              }
                            else
                              {
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "try again";
                                
                                $response = Response::make($output, 400);
                              }
                               
                           }
                           else{
                                 $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "يجب أدخال الباسورد الصحيح";
                                
                                $response = Response::make($output, 400);
                               
                           }
                            
            
                           
                        }
                        else{
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "Invalid token";  
                                $response = Response::make($output, 401);
                        }
                    }
                    else{
                        // not valia
                        $output['message'] = false;
                        $output['code'] = 6000;
                        $output['data'] = "Invalid token";  
                        $response = Response::make($output, 401);
                        
                    }
                    
                }
                else{
                     $output['message'] = false;
                    $output['code'] = 6000;
                    $output['data'] = "يرجى إدخال  Access Token ";
                    
                    $response = Response::make($output, 400);
                }
            
           
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6002;
            $output['data'] = "لا توجد داتا للتعديل";
            $response = Response::make($output, 400);
        }
        return $response->header('Content-Type','application/json');      
        
    }
    
     public function edit(Request $request)
     {
         if($request->has('name') ||
        $request->has('address') ||
        $request->has('email') 
        || $request->has('image'))
        {
             if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                       
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        {
                            
                        }
                        elseif($isExpired == 2)
                        {
                            $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                $UserId->save();
            
                           
                           
                            // Add To Him Role User 
                            $UserData =  User::where('id',$UserId->id)->first();
                            if(isset($request->name))
                            {
                                $UserData->name = $request->name;

                            }
                            
                             if(isset($request->email))
                            {
                               $UserData->email = $request->email; 

                            }
                            
                            // 
                            if(isset($request->image))
                            {
                                $Image=$request->image;
                                $Iamge_name=time().".".$Image->getClientOriginalExtension();
                                $Image->move('Upload',$Iamge_name);
                                $UserData->url = $Iamge_name;
                            }
                            
                            // 
                           if(isset($request->address))
                           {
                               $UserData->address = $request->address;
                               
                           }
                          
                   
                            
            
                            if($UserData->save())
                            {
                                $output['message'] = true;
                                $output['code'] = 6001;
                                $output['data'] = "تم تعديل بيانات المستخدم  "; 
                                $response = Response::make($output, 200);
                            }
                            else
                            {
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "try again";
                                
                                $response = Response::make($output, 400);
                            }
                        }
                        else{
                                $output['message'] = false;
                                $output['code'] = 6000;
                                $output['data'] = "Invalid token";  
                                $response = Response::make($output, 401);
                        }
                    }
                    else{
                        // not valia
                        $output['message'] = false;
                        $output['code'] = 6000;
                        $output['data'] = "Invalid token";  
                        $response = Response::make($output, 401);
                        
                    }
                    
                }
                else{
                     $output['message'] = false;
                    $output['code'] = 6000;
                    $output['data'] = "يرجى إدخال  Access Token ";
                    
                    $response = Response::make($output, 400);
                }
            
           
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6002;
            $output['data'] = "لا توجد داتا للتعديل";
            $response = Response::make($output, 400);
        }
        return $response->header('Content-Type','application/json');      
     }
    /*--------------------------  User Data ---------------------------------*/

    public function data(Request $request)
    {
       
                if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                       
                        
                            $UserId = $validateToken->account_id;
                            $UserId=User::where('id',$UserId)->first();
                        
                            // check for token date
                            $isExpired = $this->validateAccessTokenTime($validateToken);
                        
                            if($isExpired == 1)
                            {
                              
                                if($UserId)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $UserId;  
                                    $response = Response::make($output, 200);

                                }
                                else{
                                    $output['message'] = false;
                                    $output['code'] = 6000;
                                    $output['data'] = "رجاء المحاولة لاحقا";  
                                    $response = Response::make($output, 200);
                                }
                               
                                
                                
                            }
                            elseif($isExpired == 2)
                            {
                                
                                $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                $UserId->save();
                                if($UserId)
                                {
                                    $UserId->url='http://istsher.com/Zlitn/Upload/'.$UserId->url;

                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $UserId;  
                                    $response = Response::make($output, 200);

                                }
                                else{
                                    $output['message'] = false;
                                    $output['code'] = 6000;
                                    $output['data'] = "رجاء المحاولة لاحقا";  
                                    $response = Response::make($output, 200);
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

        return response()->json($output);
        
    }
/*--------------------------End--Register---------------------------------*/

    public function UserSignUp(Request $request)
    {
        
        if($request->has('name') &&
        $request->has('address') &&
        $request->has('email') &&
        $request->has('password'))
       
        {
            $checkEmail = User::where('email',$request->email)->first();
            if(! $checkEmail)
            {
                if(isset($request->image))
                {
                    $Image=$request->image;
                    $Iamge_name=time().".".$Image->getClientOriginalExtension();
                    $Image->move('Upload',$Iamge_name);
                }
                else
                {
                    $Iamge_name="";
                }
               
                // Add To Him Role User 
                $UserData = new User;
                $UserData->name = $request->name;
                $UserData->email = $request->email;   
                $UserData->url = $Iamge_name;
                $UserData->address = $request->address;
                $UserData->password = Hash::make($request->password);

                if($UserData->save())
                {
                    $UserData->attachRole(Role::where('id',3)->first());
                    $output['message'] = true;
                    $output['code'] = 6001;
                    $output['data'] = $UserData->id; 
                    $response = Response::make($output, 200);
                }
                else
                {
                    $output['message'] = false;
                    $output['code'] = 6000;
                    $output['data'] = "try again";
                    
                    $response = Response::make($output, 400);
                }
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 6000;
                $output['data'] = "You cannot use this email"; 
                $response = Response::make($output, 400);
            }
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 6002;
            $output['data'] = "Missing Input";
            $response = Response::make($output, 400);
        }
        return $response->header('Content-Type','application/json');                         
    }
/*--------------------------End--Register---------------------------------*/

/*----------------Login----------------------------------*/
  public function login(Request $request)
    {
        if($request->has('email') && $request->has('password') && $request->has('Token_Device')  )
        {
            $UserData = User::where("email" , $request->email)->with('shop')->first();

            
            if($UserData && Hash::check($request->password , $UserData->password ))
            {

                $UserData->access_token = $this->generateAccessToken($UserData->id, $UserData->email,$UserData->name);
                $UserData->Device_Token=$request->Token_Device;
                $UserData->save();
                $UserData->url='http://istsher.com/Zlitn/Upload/'.$UserData->url.'';
                // $ShopData->Business_Register='http://homessegypt.com/ZlitnMallA/shopfiles/'.$ShopData->Business_Register.'';
                $FinalUserData=$UserData;
                // $ShopData=Shop::where('user_id',$UserData->id)->first();
                $ShopData = Shop::where('user_id',$UserData->id)->with('category')->with('city')->first();
                if($ShopData)
                {
                     $ShopData->shop_photo=
                    'http://istsher.com/Zlitn/shopPhoto/'.$ShopData->shop_photo.'';
                    $ShopData->Business_Register=
                    'http://istsher.com/Zlitn/shopfiles/'.$ShopData->Business_Register.'';
                    $FinalShopData=$ShopData;
                    
                }
               
                unset($UserData->password);
                $output['message'] = true;
                $output['code'] = 6006;
                $output['data'] = $FinalUserData;
                // $output['role'] = $FinalUserData->roles;
                // if($ShopData)
                // {
                //   $output['shop'] = $ShopData;

                    
                // }
                
                $response = Response::make($output, 200);
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 6007;
                $output['data'] = "Invalid Login";
                
                $response = Response::make($output, 400);
            }
        }
       
       
        else
        {
            $output['message'] = false;
            $output['code'] = 6004;
            $output['data'] = "Missing Input";
            $response = Response::make($output, 400);
        }
        return $response->header('Content-Type','application/json');
    }

private function generateAccessToken($accountId, $email,$name)
{
        $access_token = "";
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
        $access_token = $encryptedHeader . "." . $encryptedPayload . "." . $signature;

        return $access_token;
}


   // Herper Function 
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
    // End of this healper  





/*----------------------------End Login ---------------------------------*/
    
}
