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
use Response;
use Carbon\Carbon;
use App\ Role;
use App\User;
use App\User_Role;
class MenuApiController extends Controller
{
    private $ttl = 100160;

    public function ProductList()
    {
        // كل برودكت باسم المحل بتاعه 
        $products=product::with('shop')->where('Status','=','نشر')->take(3)->orderBy('created_at','DESC')->get();
        
        

        $FinalProduct=array();
        foreach($products as $i=>$product)
        {
            $product->url='http://istsher.com/Zlitn/Upload/'.$product->url.'';
             unset($product->shop_id,$product->shop->shop_city,$product->shop->shop_category,$product->shop->shop_address,$product->shop->shop_photo,$product->shop->Business_Register,$product->shop->user_id); 
            $FinalProduct[$i]=$product; 
        }
       

        if($FinalProduct)
        {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = $FinalProduct;
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 5002;
            $output['data'] = [];
        }
        return response()->json($output);

        


    }

    public function createproduct(request $request)
    {
        if( $request->has('Product_Title')
        && $request->has('Product_Descraption')
        && $request->has('shop_id')
        && $request->has('Product_price')
       
        
         )
        {
                $ShopData=shop::where("id" , $request->shop_id)->first();
                if($ShopData)
                {
                    if($request->headers->has('accesstoken') )
                    {
                        $validateToken = $this->validateAccessToken($request->header('accesstoken'));
                    
                        
                        if($validateToken)
                        {
                            $ShopId=$request->shop_id;
                            
                            $UserId = $validateToken->account_id;
                            $UserId = User::where("id" , $UserId)->first();
                            $ShopData=shop::where("id" , $ShopId)->first();
                            if($ShopData->user_id==$UserId->id)
                            {
                                
                                // check for token date
                                $isExpired = $this->validateAccessTokenTime($validateToken);
                            
                                if($isExpired == 1)
                                {
                                   
                                    $Iamge_name='';
                                    $products=new product();
                                    $products->products_title=$request->Product_Title;
                                    $products->products_descraption=$request->Product_Descraption;
                                    $products->shop_id=$request->shop_id;
                                    $products->products_price=$request->Product_price;
                                    $products->Category_id=$ShopData->shop_category;
                                    $products->url=$Iamge_name;
                                    $product->user_id=$UserId ;
                                    

                                    if($products->save())
                                    {
                                        if(isset($request->Product_url))
                                        {
                                            $product=product::orderBy('created_at','DESC')->get();
                                            $path1=Public_path('Upload').'/Upload';
                                            $image_no=$product[0]->id;
                                            $path = $path1.$image_no.".png";
                                            $status = file_put_contents($path,base64_decode($request->Product_url));
                                            $Iamge_name=$image_no.".png";
                                            $product[0]->url=$Iamge_name;
                                            $$product[0]->save();
                                        }
                                        //
                                        $output['message'] = true;
                                        $output['code'] = 6000;
                                        $output['data'] = "تم أضافة المنتج بنجاح";  
                                        $response = Response::make($output, 200);

                                    }
                                    else
                                    {
                                        // 
                                        $output['message'] =false;
                                        $output['code'] = 6000;
                                        $output['data'] = "المحاوله لاحقا ";  
                                        $response = Response::make($output, 200);

                                    }
                                   
                                    
                                    
                                    
                                }
                                elseif($isExpired == 2)
                                {
                                    
                                    
                                    $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                    
                                    $UserId->save();
                                   
                                   
                                        $Iamge_name="";
                                    
                                                                     
                                    $products=new product();
                                   
                                    $products->products_title=$request->Product_Title;
                                    $products->products_descraption=$request->Product_Descraption;
                                    $products->shop_id=$request->shop_id;
                                    $products->products_price=$request->Product_price;
                                      
                                    $products->Category_id=$ShopData->shop_category;
                                  
                                    $products->url=$Iamge_name;
                                    
                                    $products->user_id=$UserId->id ;
                                    
                                   
                                   
                                    if($products->save())
                                    {
                                        if(isset($request->Product_url))
                                        {
                                            $Image=$request->Product_url;
                                            $product=product::orderBy('id','DESC')->first();
                                            $Iamge_name=time().".".$Image->getClientOriginalExtension();
                                             $Image->move('Upload',$Iamge_name);
                                            $product->url=$Iamge_name;
                                            $product->save();
                                        }
                                        // 
                                        $output['message'] = true;
                                        $output['code'] = 6000;
                                        $output['data'] = "تم أضافة المنتج بنجاح";  
                                        $response = Response::make($output, 200);

                                    }
                                    else
                                    {
                                        // 
                                        $output['message'] =false;
                                        $output['code'] = 6000;
                                        $output['data'] = "المحاوله لاحقا ";  
                                        $response = Response::make($output, 200);

                                    }



                                }
                                else
                                {
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
                                    $output['data'] = "هذا المستخدم لا يستطيع أضافة منتج فى  هذا المحل ";  
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


    // public function createproduct(request $request)
    // {
    //     if( $request->has('Product_Title')
    //     && $request->has('Product_Descraption')
    //     && $request->has('shop_id')
    //     && $request->has('Product_price')
       
        
    //      )
    //     {
    //             $ShopData=shop::where("id" , $request->shop_id)->first();
    //             if($ShopData)
    //             {
    //                 if($request->has('accesstoken') )
    //                 {
    //                     $validateToken = $this->validateAccessToken($request->accesstoken);
                    
                        
    //                     if($validateToken)
    //                     {
    //                         $ShopId=$request->shop_id;
                            
    //                         $UserId = $validateToken->account_id;
    //                         $UserId = User::where("id" , $UserId)->first();
    //                         $ShopData=shop::where("id" , $ShopId)->first();
    //                         if($ShopData->user_id==$UserId->id)
    //                         {
                                
    //                             // check for token date
    //                             $isExpired = $this->validateAccessTokenTime($validateToken);
                            
    //                             if($isExpired == 1)
    //                             {
    //                                 if(isset($request->Product_url))
    //                                 {
    //                                     $Iamge_name=time().".".$request->Product_url->getClientOriginalExtension();
    //                                     $request->Product_url->move(Public_path('Upload'),$Iamge_name);
    //                                 }
    //                                 else
    //                                 {
    //                                     $Iamge_name="";
    //                                 }
                                  
    //                                 $products=new product();
    //                                 $products->products_title=$request->Product_Title;
    //                                 $products->products_descraption=$request->Product_Descraption;
    //                                 $products->shop_id=$request->shop_id;
    //                                 $products->products_price=$request->Product_price;
    //                                 $products->Category_id=$ShopData->shop_category;
    //                                 $products->url=$Iamge_name;
    //                                 $product->user_id=$UserId ;
                                    

    //                                 if($products->save())
    //                                 {
    //                                     // 
    //                                     $output['message'] = true;
    //                                     $output['code'] = 6000;
    //                                     $output['data'] = "تم أضافة المنتج بنجاح";  
    //                                     $response = Response::make($output, 200);

    //                                 }
    //                                 else
    //                                 {
    //                                     // 
    //                                     $output['message'] =false;
    //                                     $output['code'] = 6000;
    //                                     $output['data'] = "المحاوله لاحقا ";  
    //                                     $response = Response::make($output, 200);

    //                                 }
                                   
                                    
                                    
                                    
    //                             }
    //                             elseif($isExpired == 2)
    //                             {
                                    
                                    
    //                                 $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                    
    //                                 $UserId->save();
                                   
    //                                 if(isset($request->Product_url))
    //                                 {
    //                                     $Iamge_name=time().".".$request->Product_url->getClientOriginalExtension();
    //                                     $request->Product_url->move(Public_path('Upload'),$Iamge_name);
    //                                 }
    //                                 else
    //                                 {
    //                                     $Iamge_name="";
    //                                 }
                                                                     
    //                                 $products=new product();
                                   
    //                                 $products->products_title=$request->Product_Title;
    //                                 $products->products_descraption=$request->Product_Descraption;
    //                                 $products->shop_id=$request->shop_id;
    //                                 $products->products_price=$request->Product_price;
                                      
    //                                 $products->Category_id=$ShopData->shop_category;
                                  
    //                                 $products->url=$Iamge_name;
                                    
    //                                 $products->user_id=$UserId->id ;
                                    
                                   
                                   
    //                                 if($products->save())
    //                                 {
    //                                     // 
    //                                     $output['message'] = true;
    //                                     $output['code'] = 6000;
    //                                     $output['data'] = "تم أضافة المنتج بنجاح";  
    //                                     $response = Response::make($output, 200);

    //                                 }
    //                                 else
    //                                 {
    //                                     // 
    //                                     $output['message'] =false;
    //                                     $output['code'] = 6000;
    //                                     $output['data'] = "المحاوله لاحقا ";  
    //                                     $response = Response::make($output, 200);

    //                                 }



    //                             }
    //                             else
    //                             {
    //                                 $output['message'] = false;
    //                                 $output['code'] = 6000;
    //                                 $output['data'] = "توكن غير صحيح ";  
    //                                 $response = Response::make($output, 401);
    //                             }

    //                         }
    //                         else
    //                         {
    //                                 $output['message'] = false;
    //                                 $output['code'] = 6000;
    //                                 $output['data'] = "هذا المستخدم لا يستطيع أضافة منتج فى  هذا المحل ";  
    //                                 $response = Response::make($output, 401);

    //                         }
    //                     }
    //                     else
    //                     {
    //                         $output['message'] = false;
    //                         $output['code'] = 6000;
    //                         $output['data'] = "Invalid token";  
    //                         $response = Response::make($output, 401);
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $output['message'] = false;
    //                     $output['code'] = 6000;
    //                     $output['data'] = "يرجى إدخال  Access Token ";
                        
    //                     $response = Response::make($output, 400);
    //                 }
    //             }
    //             else
    //             {
    //                 $output['message'] = false;
    //                 $output['code'] = 60012;
    //                 $output['data'] = "لا يوجد هذا المحل ";
    //                 $response = Response::make($output, 400);

    //             }
           
            

    //     }

    //     else
    //     {

    //         $output['message'] = false;
    //         $output['code'] = 6000;
    //         $output['data'] = "توجد داتا ناقصة";
    //         $response = Response::make($output, 400);

    //     }
        
            
    //     return response()->json($output);
    // }

    
    
    public function citylist()
    {
       
        
        $output = array();
        // get all category
        $allcites = city::all();
        if($allcites)
        {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = $allcites;
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 5002;
            $output['data'] = [];
        }
        return response()->json($output);
        //return $allLinks;
    
    }

    public function categorylist()
    {
       
        
        $output = array();
        //dd("d");
        // get all category
        $allcategories = category::with('product')->get();
        $Finalcategories=array();
        foreach($allcategories as $i=>$allcategory)
        {
            $allcategory->image='http://istsher.com/Zlitn/CatImage/'.$allcategory->image.'';
            $Finalcategories[$i]=$allcategory; 
        }
        
        if($Finalcategories)
        {
            $output['message'] = true;
            $output['code'] = 100;
            $output['data'] = $Finalcategories;
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 5004;
            $output['data'] = [];
        }
        return response()->json($output);
        //return $allLinks;
    
    }


    public function Menulist()
    {
       
        
        $output = array();
        // get all category
        $allcategories = category::with('shop')->get();
        $Finalcategories=array();
        foreach($allcategories as $i=>$allcategory)
        {
            $allcategory->image='http://istsher.com/Zlitn/CatImage/'.$allcategory->image.'';
            $Finalcategories[$i]=$allcategory; 
            
            foreach($allcategory->shop  as $shopp)
            {
                $shopp->shop_photo='http://istsher.com/Zlitn/shopPhoto/'.$shopp->shop_photo;
            }
        }
        if($Finalcategories)
        {
            $output['message'] = true;
            $output['code'] = 105;
            $output['data'] = $Finalcategories;
        }
        else
        {
            $output['message'] = false;
            $output['code'] = 5005;
            $output['data'] = [];
        }
        return response()->json($output);
        //return $allLinks;
    
    }

    // search

    public function search(request $request)
    {
        if($request->has('SearchText') )
        {
            $SearchText=$request->SearchText;
            $Catogory=$request->categoryID;
            $City=$request->CityID;
            $products=product::with('shop')->
             join('shop','products.shop_id','shop.id')->
             where('products.products_title','like','%'.$SearchText.'%')
             ->where('products.Status','=','نشر')
            ->orWhere('products.products_descraption','like','%'.$SearchText.'%')
            ->orWhere('products.Category_id','=',$Catogory)
            ->orWhere('shop.shop_city','=',$City)
            ->orderBy('products.created_at','DESC')
            ->select('products.*')->get();
            
            //   $products=product::
            //  join('shop','products.shop_id','shop.id')->
            //  where('products.products_title','like','%'.$SearchText.'%')
            //  ->where('products.Status','=','نشر')
            // ->orWhere('products.products_descraption','like','%'.$SearchText.'%')
            // ->orWhere('products.Category_id','=',$Catogory)
            // ->orWhere('shop.shop_city','=',$City)
            // ->orderBy('products.created_at','DESC')
            // ->select('products.*')->get();
       
            $FinalProduct=array();
            foreach($products as $i=>$product)
            {
                
                    $product->url='http://istsher.com/Zlitn/Upload/'.$product->url.'';
                    $FinalProduct[$i]=$product; 
                    
               
               
            }
            if($FinalProduct)
            {
                $output['message'] = true;
                $output['code'] = 6000;
                $output['data'] = $FinalProduct;  
            }
            else
            {
                $output['message'] = false;
                $output['code'] = 60012;
                $output['data'] = "لا توجد منتجات مطابقة  ";
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
