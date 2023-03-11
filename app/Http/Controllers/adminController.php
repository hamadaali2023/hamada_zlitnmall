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
// use Symfony\Component\HttpFoundation\Request;

class adminController extends Controller
{
    /*------Categories-----------*/
    public function ShowCategories()
    {
        $categorys=category::all();

        return view('account.pages.Categories',compact('categorys'));

    }

    public function storeCategories(request $request)
    {
        $this->validate( $request,
        [  

            'Category_Name'=>'required|unique:categories,categories_name|max:60|min:5',
            'Category_Descraption'=>'required',
            'image'=>'required'


        ],
        [
            'Category_Name.required'=>'يجب إدخال أسم التصنيف ',
            'Category_Name.unique'=>' أسم التصنيف موجود مسبقا ',
            'Category_Name.min'=>' أسم التصنيف يجب أن لا يقل عن 5 حروف ',
            'Category_Name.max'=>' أسم التصنيف يجب أن لا يزيد عن 60 حرف ',
            'Category_Descraption.required'=>' يرجي إدخال نبذة عن التصنيف ',
            
            'image.required'=>'يجب إدخال صورة للتصنيف ',
            
           
        ]

       );

        $category=new category();
        $category->categories_name=$request->Category_Name;
        $category->categories_descraption=$request->Category_Descraption;
        $Iamge_cat=time().".".$request->image->getClientOriginalExtension();
        $category->image=$Iamge_cat;
        $category->save();
        $request->image->move(Public_path('CatImage'),$Iamge_cat);
        return redirect('/Admin/Categories');
    }

    public function UpdatCategorysubmit(request $request)
    {

        $category= category::where('id',$request->id)->first();
        $category->categories_name=$request->Category_Name;
        $category->categories_descraption=$request->Category_Descraption;
        if(isset($request->image) &&  $request->image!='' )
        {
            $Iamge_cat=time().".".$request->image->getClientOriginalExtension();
            $request->image->move(Public_path('CatImage'),$Iamge_cat);
            $category->image=$Iamge_cat;

        }
        else{
            $category->image=$category->image;
        }    
        $category->save();
        return redirect('/Admin/Categories');
    }

    public function DeleteCategory($id)
    {
        category::where('id',$id)->delete();
        return back();
    }

    public function UpdatCategory($id)
    {
        $category=category::where('id',$id)->first();
        $categorys=category::all();

        return view('account.pages.Categories',compact('categorys','category'));

    }

    /*------ End Categories-----------*/

    /*------Cites-----------*/
    public function Showcity()
    {
        $citys=city::all();
        return view('account.pages.Cites',compact('citys'));
    }

    public function storecity(request $request)
    {

        $this->validate( $request,
        [  
            'City_Name'=>'required|unique:cities,City_name',            
        ],
        [
            'City_Name.required'=>'يجب إدخال أسم المدينة ',
            'City_Name.unique'=>' أسم المدينة موجود مسبقا ',

        ]

       );
      
         $citys=new city();
         $citys->City_name=$request->City_Name;
         $citys->City_code=$request->City_code;
         $citys->save();

        return redirect('/Admin/Cites');
    }
    public function Citesdelete($id)
    {
        city::where('id',$id)->delete();
        return back();
    }
    public function Citesupdate($id)
    {
        $city=city::where('id',$id)->first();
        $citys=city::all();

        return view('account.pages.Cites',compact('citys','city'));
    }

    public function CitesStoreupdate(request $request)
    {
        $citys= city::where('id',$request->id)->first();
        $citys->City_name=$request->City_Name;
        $citys->City_code=$request->City_code;
        $citys->save();

       return redirect('/Admin/Cites');

    }

    /*------end Cites-----------*/

/*-----------Shop-------------------------*/

    public function shops()
    {
        $cites=city::all();
        $catogorys=category::all();
        $shops=Shop::
        join('categories', 'shop.shop_catogary', '=', 'categories.id')
        ->join('users', 'shop.user_id', '=', 'users.id')
        ->join('cities','shop.shop_city','cities.id')
        ->select('shop.id','shop.shop_name','shop.shop_address','users.name','cities.City_name','categories.categories_name')
       ->get();
      
        return view('account.pages.shops',compact('cites','catogorys','shops'));
    }
    public function storeshop(request $request)
    {

        $this->validate( $request,
        [  

           'shop_image' => 'required',
           'shop_name'=>'required|unique:shop,shop_name',
           'shop_address' => 'required',
           'shop_catogary' => 'required',
           'shop_city' => 'required',


        ],
        [
            'shop_image.required'=>'يجب إدخال صورة المحل ',
            'shop_name.required'=>' يجب إدخال اسم المحل ',
            'shop_name.unique'=>' اسم المحل موجود مسبقا ',
            'shop_address.required'=>'يجب إدخال عنوان المحل ',
            'shop_catogary.required'=>'يجب إدخال تصنيف المحل ',
            'shop_city.required'=>'يجب إدخال المدينة التي بها المحل ',
        ]

       );
       
        // shop image store 
        if(isset($request->shop_image))
        {
            $Iamge_name=time().".".$request->shop_image->getClientOriginalExtension();
            $request->shop_image->move(Public_path('shopPhoto'),$Iamge_name);


        }
        else
        {
            $Iamge_name='';
        }
        // السجل التجارى 
        if(isset($request->shop_Bussnuss))
        {
            $Filename=time().".".$request->shop_Bussnuss->getClientOriginalExtension();
            $request->shop_Bussnuss->move(Public_path('shopfiles'),$Filename);
        }
        else
        {
            $Filename='';
        }
        $Shop=new Shop();
        $category=category::where('id',$request->shop_catogary)->first();
        if($category==null)
        {
            return redirect()->back()->with('Fail', 'لا يوجد تصنيف بهذا الأسم ');
            
        }
        $city=city::where('id',$request->shop_city)->first();
        if($city==null)
        {
            return redirect()->back()->with('Fail', 'لاتوجد مدينة بهذا الأسم ');
            
        }
        $Shop->shop_category  =$request->shop_catogary;
        $Shop->shop_city  =$request->shop_city;
        $Shop->shop_name  =$request->shop_name;
        $Shop->user_id  =$request->user_id;
        $Shop->shop_address  =$request->shop_address;
        $Shop->shop_photo=$Iamge_name;
        $Shop->Business_Register=$Filename;
        $Shop->save();
        return redirect('/Admin/shops'); 

    }

    public function Deleteshop($id)
    {
        shop::where('id',$id)->delete();
        return back();
    }

    public function Updateshop($id)
    {
        $shop=shop::where('id',$id)->first();
        $cites=city::all();
        $catogorys=category::all();    
        return view('account.pages.editshop',compact('cites','catogorys','shop'));
    }

    public function Shopupdate(Request $request)
    {
        $Shop=shop::where('id',$request->id)->first();
        
       
        // shop image store 
        if(isset($request->shop_image))
        {
            $Iamge_name=time().".".$request->shop_image->getClientOriginalExtension();
            $request->shop_image->move(Public_path('shopPhoto'),$Iamge_name);


        }
        else
        {
            $Iamge_name=$Shop->shop_photo;
        }
        // السجل التجارى 

        if(isset($request->shop_Bussnuss))
        {
            $Filename=time().".".$request->shop_Bussnuss->getClientOriginalExtension();
            $request->shop_Bussnuss->move(Public_path('shopfiles'),$Filename);
        }
        else
        {
           $Filename= $Shop->Business_Register;
        }
       
        $category=category::where('id',$request->shop_catogary)->first();
        if($category==null)
        {
            return redirect()->back()->with('Fail', 'لا يوجد تصنيف بهذا الأسم ');
            
        }
        $city=city::where('id',$request->shop_city)->first();
        if($city==null)
        {
            return redirect()->back()->with('Fail', 'لاتوجد مدينة بهذا الأسم ');
            
        }
        $Shop->shop_category  =$request->shop_catogary;
        $Shop->shop_city  =$request->shop_city;
        $Shop->shop_name  =$request->shop_name;
        $Shop->user_id  =$request->user_id;
        $Shop->shop_address  =$request->shop_address;
        $Shop->shop_photo=$Iamge_name;
        $Shop->Business_Register=$Filename;
      
        $Shop->user_id=$request->user_id;

        $Shop->save();
        return redirect('/Admin/shops'); 

    }









/*---------------end shop----------------*/

/*------products-----------*/
    public function Showproducts()
    {
        $shops=shop::all();
        $catogorys=category::all();
        $products=product::all();
        
        $productts = DB::table('products')
             ->join('categories', 'products.Category_id', '=', 'categories.id')
             ->join('users', 'products.user_id', '=', 'users.id')
             ->join('shop','products.shop_id','=','shop.id')
             ->select('products.id','products.products_title','products.products_descraption',
             'products.products_price','categories.categories_name','shop.shop_name','users.name',
             'products.Status','products.url')
            ->get();

           

        return view('account.pages.products',compact('productts','catogorys','shops','products'));

    }

    public function storeproducts(request $request)
    {
       $Iamge_name=time().".".$request->Product_url->getClientOriginalExtension();
       $products=new product();
       $products->products_title=$request->Product_Title;
       $products->products_descraption=$request->Product_Descraption;
       $products->shop_id=$request->shop_id;
       $products->products_price=$request->Product_price;
       $products->Category_id=$request->Product_catogary;
       $products->url=$Iamge_name;
       $product->user_id=$request->user_id ;
       $products->save();

       $request->Product_url->move(Public_path('Upload'),$Iamge_name);
        return redirect('/Admin/products');
    }


    public function Deleteproduct($id)
    {
        product::where('id',$id)->delete();
        
        return back();
    }
    public function Updateproduct($id)
    {
        $product=product::find($id);
        
        $catId=$product->Category_id;
        $catogorys=category::all();
        
        $catName=DB::table('categories')->where('id',$catId)->value('categories_name');
        return view("account.pages.UpdateProducts",compact("product","catName","catogorys"));
    }
    public function product_Status(Request $request,$id)
    {
       
        $product=product::where('id',$id)->first();
        $product->Status=$request->status;
        $product->save();
        return redirect('/Admin/products');
    }

/*------end products-----------*/

   
}
