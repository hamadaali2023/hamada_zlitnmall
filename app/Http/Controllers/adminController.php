<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\section;
use App\product;
use App\product_section;
use DB;
use Auth;

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
        $category=new category();
        $category->categories_name=$request->Category_Name;
        $category->categories_descraption=$request->Category_Descraption;
        $category->save();

        return redirect('/Admin/Categories');
    }

    /*------ End Categories-----------*/

    /*------sections-----------*/
    public function ShowSections()
    {
        $sections=section::all();

        return view('account.pages.sections',compact('sections'));

    }

    public function storeSections(request $request)
    {
         $sections=new section();
         $sections->sections_name=$request->Section_Name;
        
         $sections->save();

        return redirect('/Admin/Sections');
    }

    /*------end sections-----------*/

    /*------products-----------*/
    public function Showproducts()
    {
        $sections=section::all();
        $catogorys=category::all();
        $products=product::all();
        
        $productts = DB::table('products')
             ->join('categories', 'Category_id', '=', 'categories.id')
             ->join('users', 'user_id', '=', 'users.id')
            ->get();
            
     

        return view('account.pages.products',compact('productts','catogorys','sections','products'));

    }

    public function storeproducts(request $request)
    {
       $Iamge_name=time()."-".$request->Product_url->getClientOriginalExtension();

       $products=new product();
       
       $products->products_title=$request->Product_Title;
       $products->products_descraption=$request->Product_Descraption;
       $products->products_color=$request->Product_color;

       $products->products_price=$request->Product_price;
       $products->products_stock=$request->Product_stock;

       $products->products_MostSell=0;
       $products->Category_id=$request->Product_catogary;
       $products->url=$Iamge_name;
       //$product->user_id=$request->user_id ;
       $products->save();

       $request->Product_url->move(Public_path('Upload'),$Iamge_name);

       $section_p=$request->Input('product_section');

       if(is_array($section_p))
       {
        foreach($section_p as $section)
        {
             $P_sections=new product_section();
             $P_sections->product_id=$products->id;
             $P_sections->section_id=$section;
             $P_sections->save();
        }

       }
       else
       {
          $P_sections=new product_section();
          $P_sections->product_id=$products->id;
          $P_sections->section_id=$section;
          $P_sections->save();

       }

       
        return redirect('/Admin/products');
    }


    public function Deleteproduct($id)
    {
        $product=product::find($id);
        $product->delete();
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

    /*------end products-----------*/
}
