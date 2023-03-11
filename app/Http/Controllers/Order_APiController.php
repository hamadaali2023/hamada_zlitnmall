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
use App\Orders;
use App\Orders_Item;
use App\CartApi;
use App\Cart;
use App\Traits\PushNotificationsTrait;

class Order_APiController extends Controller
{
    private $ttl = 100160;
     use PushNotificationsTrait;
    
    public function CartCount(Request $request)
     {
        if($request->has('user_id'))
        {
           
                $CartItem=CartApi::where('user_id',$request->user_id)->get();
                if($CartItem)
                {
                        $count=0;
                        foreach($CartItem as $Cart)
                        {
                            $count+=$Cart->Quentity;
                        }
                    
                        $output['message'] =true;
                        $output['code'] = 6000;
                        $output['data'] = $count;  
                        $response = Response::make($output, 200);
                }
                else{
                    
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد كارت ";  
                    $response = Response::make($output, 400);

                }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = " يرجى تحديد المستخدم";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    
    public function DeleteFCart(Request $request)
     {
        if($request->has('user_id')&& $request->has('product_id'))
        {
           
                $CartItem=CartApi::where('user_id',$request->user_id)->where('product_id',$request->product_id)->first();
                if($CartItem)
                {
                   
                    
                       CartApi::where('user_id',$request->user_id)->where('product_id',$request->product_id)->delete();
                        $output['message'] =true;
                        $output['code'] = 6000;
                        $output['data'] = "تم مسح هذا المنتج من الكارت";  
                        $response = Response::make($output, 200);

                   
                    

                }
                else{
                    
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا المنتج";  
                    $response = Response::make($output, 400);

                }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = "توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    
    
    // 
     public function DeleteCart(Request $request)
     {
        if($request->has('cart_id'))
        {
           
                $CartItem=CartApi::where('id',$request->cart_id)->first();
                if($CartItem)
                {
                   
                    
                       CartApi::where('id',$request->cart_id)->delete();
                        $output['message'] =true;
                        $output['code'] = 6000;
                        $output['data'] = "تم مسح هذا المنتج من الكارت";  
                        $response = Response::make($output, 200);

                   
                    

                }
                else{
                    
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا الكارت";  
                    $response = Response::make($output, 400);

                }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = "توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    // 
      public function GetCart(Request $request)
    {
        if($request->has('user_id'))
        {
            $User=User::where('id',$request->user_id)->first();
            if($User)
            {
                $CartItem=CartApi::where('user_id',$request->user_id)->with(['products'=> function($query) 
                   {
                      $query->with('shop');
                      
                   }
                    ])->get();
                
                if($CartItem)
                {
                    $Finalproduct=array();
                     $Totalprice=0;
                                 

                        foreach($CartItem as $i=>$product)
                        {
                        
                            $product->products->url = 'http://istsher.com/Zlitn/Upload/' . $product->products->url . '';
                            $product->products->shop->shop_photo='http://istsher.com/Zlitn/shopPhoto/'.$product->products->shop->shop_photo;
                            $product->products->shop->Business_Register='http://istsher.com/Zlitn/shopPhoto/'.$product->products->shop->Business_Register;

                           
                            // $Finalproduct[$i] = $product;
                            $Totalprice+=$product->products->products_price*$product->Quentity;
                            
                        }
                    
                       
                        $output['message'] =true;
                        $output['code'] = 6000;
                        $output['data'] = $CartItem;
                        $output['Totalprice']=$Totalprice;
                        $response = Response::make($output, 200);

                   
                    

                }
                else{
                    
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا الكارت";  
                    $response = Response::make($output, 400);

                }
            

               

                
            }
            else
            {
                // 
                $output['message'] =false;
                $output['code'] = 6001;
                $output['data'] = "لا يوجد هذا الحساب";  
                $response = Response::make($output, 400);

            }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = "توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    // 
     public function AddToCart(Request $request)
    {
        if($request->has('user_id')
        && $request->has('product_id'))
        {
            $User=User::where('id',$request->user_id)->first();
            if($User)
            {
                $product=product::where('id',$request->product_id)->first();
                if($product)
                {
                      $CartItem=CartApi::where('user_id',$request->user_id)->where('product_id',$request->product_id)->first();
                        if($CartItem)
                        {
                           
                                $CartItem->Quentity=$CartItem->Quentity+1;
                                $CartItem->save();
                                $output['message'] =true;
                                $output['code'] = 6000;
                                $output['data'] = "تم أضافه المنتج للكارت";  
                                $response = Response::make($output, 200);

                           

                        }
                        else{
                            $newCart=new CartApi();
                            $newCart->user_id=$request->user_id;
                            $newCart->product_id=$request->product_id;
                            $newCart->Quentity=1;
                            $newCart->save();
                            $output['message'] =true;
                            $output['code'] = 6000;
                            $output['data'] = "تم أضافه المنتج للكارت";  
                            $response = Response::make($output, 200);

                        }
                   

                }else{
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا المنتج";  
                    $response = Response::make($output, 400);

                }

                
            }
            else
            {
                // 
                $output['message'] =false;
                $output['code'] = 6001;
                $output['data'] = "لا يوجد هذا الحساب";  
                $response = Response::make($output, 400);

            }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = " توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    // 
    public function Plus(Request $request)
    {
        if($request->has('user_id')
        && $request->has('product_id')
        )
        {
            $User=User::where('id',$request->user_id)->first();
            if($User)
            {
                $product=product::where('id',$request->product_id)->first();
                if($product)
                {
                    
                        $CartItem=CartApi::where('user_id',$request->user_id)->where('product_id',$request->product_id)->first();
                        if($CartItem)
                        {
                              $CartItem->Quentity=$CartItem->Quentity+1;
                                $CartItem->save();
                                $output['message'] =true;
                                $output['code'] = 6000;
                                $output['data'] = "تم تعديل  للكارت";  
                                $response = Response::make($output, 200);

                            
                            

                        }
                        else{
                           
                            $output['message'] =false;
                            $output['code'] = 6001;
                            $output['data'] = "لا يوجد هذا المنتج فى الكارت";  
                            $response = Response::make($output, 400);

                        }
                   


                }else{
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا المنتج";  
                    $response = Response::make($output, 400);

                }

                
            }
            else
            {
                // 
                $output['message'] =false;
                $output['code'] = 6001;
                $output['data'] = "لا يوجد هذا الحساب";  
                $response = Response::make($output, 400);

            }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = " توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }

    public function Reduce(Request $request)
    {
        if($request->has('user_id')
        && $request->has('product_id')
       )
        {
            $User=User::where('id',$request->user_id)->first();
            if($User)
            {
                $product=product::where('id',$request->product_id)->first();
                if($product)
                {
                  
                        $CartItem=CartApi::where('user_id',$request->user_id)->where('product_id',$request->product_id)->first();
                        if($CartItem)
                        {
                            if($CartItem->Quentity-1>0)
                            {
                                $CartItem->Quentity=$CartItem->Quentity-1;
                                $CartItem->save();
                                $output['message'] =true;
                                $output['code'] = 6000;
                                $output['data'] = "تم تعديل  للكارت";  
                                $response = Response::make($output, 200);

                            }
                            else
                            {
                                $CartItem->delete();
                                $output['message'] =true;
                                $output['code'] = 6000;
                                $output['data'] = "تم المسح من الكارت";  
                                $response = Response::make($output, 400);

                            }
                            

                        }
                        else{
                           
                            $output['message'] =false;
                            $output['code'] = 6001;
                            $output['data'] = "لا يوجد هذا المنتج فى الكارت";  
                            $response = Response::make($output, 400);

                        }
                    


                }else{
                    $output['message'] =false;
                    $output['code'] = 6001;
                    $output['data'] = "لا يوجد هذا المنتج";  
                    $response = Response::make($output, 400);

                }

                
            }
            else
            {
                // 
                $output['message'] =false;
                $output['code'] = 6001;
                $output['data'] = "لا يوجد هذا الحساب";  
                $response = Response::make($output, 400);

            }

        }
        else{
            $output['message'] =false;
            $output['code'] = 6001;
            $output['data'] = " توجد داتا ناقصة ";  
            $response = Response::make($output, 400);

        }
        

        return response()->json($output);

    }
    
    
    // 

    public function create(request $request)
    {
        //  $output['message'] = false;
        //     $output['code'] = 6000;
        //     $output['data'] = $request->name;
        //     $response = Response::make($output, 400);
        //     return response()->json($output);
        
        if( isset($request->name)
        && isset($request->phone)
        && isset( $request->address)
        && isset( $request->Langitude)
        && isset($request->Latitude)
        )
        {
                    if($request->headers->has('accesstoken') )
                    {
                        $validateToken = $this->validateAccessToken($request->header('accesstoken'));
                        if($validateToken)
                        {
                            $ShopId=$request->shop_id;
                            $UserId = $validateToken->account_id;
                            
                                // check for token date
                                $isExpired = $this->validateAccessTokenTime($validateToken);
                                if($isExpired == 1)
                                {
                                    $CartItem=CartApi::where('user_id',$UserId)->with('products')->get();
                                    if($CartItem)
                                    {
                                       
                                     
                                    $Orders= new Orders();
                                    $Orders->Total_Price=$request->Total_Price;
                                    $Orders->Num_Of_Product=$request->Num_Of_Product;
                                    $Orders->shopID=$request->shopID;
                                    $Orders->userID=$request->userID;
                                    $Orders->name=$request->name;
                                    $Orders->address=$request->address;
                                    $Orders->phone=$request->phone;
                                    $Orders->Langitude=$request->Langitude;
                                    $Orders->Latitude=$request->Latitude;
                                   
                                    if($Orders->save())
                                    {
                                         
                                      $CartItem=CartApi::where('user_id',$UserId)->with('products')->get();
                                      
                                    foreach($CartItem as $Singleitem)
                                    {
                                        $OrderItem=new OrderItems();
                                        $OrderItem->order_id=$Orders->id;
                                        $OrderItem->product_id=$Singleitem->product_id;
                                        $OrderItem->Quentity=$Singleitem->Quentity;
                                        $OrderItem->price=$Singleitem->Quentity* $$CartItem->products->products_price;
                                        $OrderItem->save();
                                        
                                        // 
                                       
                                         //mob notification :)
                                          $product=product::where('id',$Singleitem->product_id)->first();

                                        $user=User::where('id',$product->user_id)->first();
                                         $token = $user->Device_Token;
                            
                                        $title = "تم أضافة طلب ";
                                        $body = $order->name;
                                        // call function that will push notifications :
                                        $this->sendNotification($token , $title , $body);
                                        
                                        
                                        // 
                                    }

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
                                         $output['message'] =false;
                                        $output['code'] = 6000;
                                        $output['data'] = " لا توجد منتجات داخل الكارت ";  
                                        $response = Response::make($output, 200);
                                    }
                                   
                                    
                                    
                                    
                                }
                                elseif($isExpired == 2)
                                {
                                    
                                    $UserId=User::where('id',$UserId)->first();
                                    $UserId->access_token=$this->generateRefreshAccessToken($UserId->id, $UserId->email,$UserId->name);
                                    
                                    $UserId->save();
                                   
                                  $CartItem=CartApi::where('user_id',$UserId->id)->with('products')->get();
                                
                                    if(count($CartItem)!=0)
                                    {
                                        $totalNum=0;
                                        $totalPrice=0;
                                    foreach($CartItem as $Item)
                                    {
                                        $totalNum+=$Item->Quentity;
                                        $product=product::where('id',$Item->product_id)->first();
                                         $totalPrice+=$product->products_price;
                                        //  
                                        
                                    }
                                    
                                    $Orders= new Orders();
                                    $Orders->Total_Price=$totalPrice;
                                    $Orders->Num_Of_Product=$totalNum;
                                    // $Orders->shopID=$request->shopID;
                                    $Orders->userID=$UserId->id;
                                    $Orders->name=$request->name;
                                    $Orders->address=$request->address;
                                    $Orders->phone=$request->phone;
                                    $Orders->Langitude=$request->Langitude;
                                    $Orders->Latitude=$request->Latitude;
                                    // $Orders->OrderITem=$request->OrderItems;
                                  
                                    if($Orders->save())
                                    {
                                        
                                        foreach($CartItem as $i=>$Item)
                                        {
                                           
                                            $OrderItem=new Orders_Item();
                                            $OrderItem->order_id=$Orders->id;
                                            $OrderItem->product_id=$Item->product_id;
                                            $OrderItem->Quentity=$Item->Quentity;
                                            $OrderItem->price=$Item->products->products_price;
                                            $OrderItem->shop_id=$Item->products->shop_id;
                                         
                                            $OrderItem->save();
                                           
                                            
                            
                                        }
                                     
                                  CartApi::where('user_id',$UserId->id)->delete();
                                       
                                        // 
                                        $output['message'] = true;
                                        $output['code'] = 6000;
                                        $output['data'] = "تم أضافة طلب بنجاح";  
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
                                    else{
                                        
                                        $output['message'] =false;
                                        $output['code'] = 6000;
                                        $output['data'] = " لا توجد منتجات لك داخل الكارت ";  
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
                            $output['data'] = "يرجى تسجيل الدخول";  
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
            $output['code'] = 6000;
            $output['data'] = "توجد داتا ناقصة";
            $response = Response::make($output, 400);

        }
        
            
        return response()->json($output);
    }


    // Get All Order At Shop

    public function OrderShop(request $request)
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
                                 $Orders=Orders::join('order_product','orders.id','order_product.order_id')
                                ->where('order_product.shop_id',$ShopData->id)->select('orders.*')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                
                                // 
                                $Orders=Orders::join('order_product','orders.id','order_product.order_id')
                                ->where('order_product.shop_id',$ShopData->id)->select('orders.*')->get();
                                
                                
                                // 
                                // $Orders=Orders::with(['Order_Items'=> function($query) use($ShopData)
                                //   {
                                //       $query->where('shop_id',$ShopData->id)->with('product');
                                      
                                //   }
                                //     ])->where('delivered',0)->OrderBy('id','DESC')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                $output['data'] = "هذا المستخدم لا يستطيع روية هذا المحل ";  
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
    
    
      public function OrderItem(request $request)
    {
        if($request->has('OrderId') )
        {
            $OrderData=Orders::where("id" , $request->OrderId)->first();
            if($OrderData)
            {
                if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                        
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        $shop=Shop::where('user_id',$UserId->id)->first();
                         
                            // check for token date
                            $isExpired = $this->validateAccessTokenTime($validateToken);
                        
                            if($isExpired == 1)
                            {
                                 $Orders=Orders::join('order_product','orders.id','order_product.order_id')
                                ->where('order_product.shop_id',$ShopData->id)->select('orders.*')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                
                                $Orders_Items=Orders_Item::where('order_id',$OrderData->id)->where('shop_id',$shop->id)->with(['product'=> function($query) 
                                  {
                                      $query->with('shop');
                                      
                                  }
                                    ])->OrderBy('id','DESC')->get();
                                    
                                    foreach($Orders_Items as $Orders_Item)
                                    {
                                        $Orders_Item->product->url='http://istsher.com/Zlitn/Upload/'.$Orders_Item->product->url;
                                    }
                                if($Orders_Items)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders_Items;  
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


    // Deliverd
    public function OrderShopdelivered(request $request)
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
                                $Orders=Orders::where('shopID',$ShopData->id)->where('delivered',1)->OrderBy('id','DESC')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                $Orders=Orders::where('shopID',$ShopData->id)->where('delivered',1)->OrderBy('id','DESC')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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

    // Get All Order At User
    public function Orderuser(request $request)
    {
        if($request->has('UserId') )
        {
            $UserID=User::where("id" , $request->UserId)->first();
            if($UserID)
            {
                if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                       
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        if($UserID->id==$UserId->id)
                        {
                            
                            // check for token date
                            $isExpired = $this->validateAccessTokenTime($validateToken);
                        
                            if($isExpired == 1)
                            {
                                $Orders=Orders::where('userID',$UserID->id)->with(['Order_Items'=> function($query) 
                                   {
                                      $query->with('product');
                                      
                                   }
                                    ])->OrderBy('id','DESC')->get();
                                foreach($Orders as $Order)
                                {
                                    foreach($Order->order_items as $order_item)
                                    {
                                        $order_item->product->url='http://istsher.com/Zlitn/Upload/'.$order_item->product->url;
                                        
                                    }
                                }
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                $finalOrder= array();
                                $Orders=Orders::where('userID',$UserID->id)->with(['OrderItems'=> function($query) 
                                   {
                                      $query->with('product');
                                      
                                   }
                                    ])->OrderBy('id','DESC')->get();
                                     
                                // $Orders=Orders::where('userID',$UserID->id)->with('OrderItems')->OrderBy('id','DESC')->get();
                                foreach($Orders as $i=>$Order)
                                {
                                    foreach($Order->orderitems as $orderitem)
                                    {
                                        $orderitem->product->url='http://istsher.com/Zlitn/Upload/'.$orderitem->product->url;
                                        
                                    }
                                    
                                    $finalOrder[$i]=$Order;
                                    
                                }
                               
                               
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $finalOrder;  
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
                $output['data'] = "لا يوجد هذا المستخدم ";
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
    
    
    public function delivered(request $request)
     {
        if($request->has('OrderId') )
        {
            $OrderData=Orders::where("id" , $request->OrderId)->first();
            if($OrderData)
            {
                if($request->headers->has('accesstoken') )
                {
                    $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                
                    
                    if($validateToken)
                    {
                        
                        
                        $UserId = $validateToken->account_id;
                        $UserId = User::where("id" , $UserId)->first();
                        if($UserId->id==$OrderData->userID)
                        {
                            // check for token date
                            $isExpired = $this->validateAccessTokenTime($validateToken);
                        
                            if($isExpired == 1)
                            {
                                 $Orders=Orders::join('order_product','orders.id','order_product.order_id')
                                ->where('order_product.shop_id',$ShopData->id)->select('orders.*')->get();
                                if($Orders)
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = $Orders;  
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
                                
                               $OrderData->delivered=1;
                                if($OrderData->save())
                                {
                                    $output['message'] = true;
                                    $output['code'] = 6000;
                                    $output['data'] = "تم تأكيد الأستلام";  
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
                        else{
                             $output['message'] = false;
                        $output['code'] = 6000;
                        $output['data'] = "لا توجد لك صلاحيه على هذا الطلب ";  
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
                $output['data'] = "لا يوجد هذا الطلب ";
                $response = Response::make($output, 400);

            }

        }

        else
        {

            $output['message'] = false;
            $output['code'] = 6000;
            $output['data'] = "يرجى تحديد الطلب ";
            $response = Response::make($output, 400);

        }
        
            
        return response()->json($output);
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
}
