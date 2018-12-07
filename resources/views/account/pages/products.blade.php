@extends('account.homepage')

@section('content')



<!-- general form elements disabled -->
<div class=" ">
<div style="display: none" class="box box-warning add_product ">
  <div class="box-header with-border">
    <h3 class="box-title">Add New product </h3>
    @permission('product-read')
    <div class="text-right">
       <h3 class="box-title "> Show Product 	<button type="button"  id='showProduct' class='btn btn-link btn-sm '>
                          <i id='' class=' fa fa-plus'></i>
        </button>
         </h3>
        </div>
        @endpermission
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="/Admin/productsStore" enctype="multipart/form-data" role="form">
       
      {{ csrf_field() }}

        <!-- select input -->
        <div class="form-group">
          <label>Choise Category </label>
          <select name="Product_catogary" class="form-control select2" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
            
            @foreach ($catogorys as $catogory)
                         
            <option value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>

             @endforeach
          </select>
        </div>


        <!-- select input -->
        <div class="">
          <label>Choise Sections</label> <br> <br>
          @foreach ($sections as $section)  
          <div class="col-md-3">   
              <input class="minimal " value="{{$section->id}}"  name="product_section[]"  type="checkbox"  >
               <label>{{$section->sections_name}}</label>  <br>
          </div>
            @endforeach
        </div>
        <br>
        <br>


      <!-- text input -->
      <div class="form-group">
        <label>Product Title</label>
        <input name="Product_Title"  type="text" class="form-control" placeholder="Enter ...">
      </div>
     

      <!-- textarea -->
      <div class="form-group">
        <label>Product Descraption</label>
        <textarea name="Product_Descraption" class="form-control" rows="3" placeholder="Enter ..."></textarea>
      </div>
      
      {{--  price  --}}

      <div class="form-group">
          <label>Product Price</label>
      <div class="input-group">
        
        <span class="input-group-addon">$</span>
      
       <input name="Product_price" type="text" class="form-control">
        <span class="input-group-addon">.00</span>
      </div>
    </div>

      {{--  stock  --}}
      <div class="form-group col-md-6">
        <label>Stock </label>
      <div class="input-group"> 
        <input  name="Product_stock" type="number" class="form-control">  
      </div>
      </div>
      {{-- color --}}
      <div class="form-group col-md-6">
          <label >
            <input value="Red" name="Product_color" type="radio" class="minimal" >
            Red
          </label>
          <label >
            <input  value="Green"  name="Product_color" type="radio" class="minimal">
            Green
          </label>
          <label >
            <input value="Blue" name="Product_color" type="radio" class="minimal" >
            Blue 
          </label>
          <br>
          <label >
            <input value="Yellow" name="Product_color" type="radio" class="minimal" >
            yellow
          </label>
          <label >
            <input value="Black" name="Product_color" type="radio" class="minimal">
           Black
          </label>
          <label >
            <input value="White"  name="Product_color" type="radio" class="minimal" >
           White
          </label>
      </div>
      <br>
      
      {{--  image  --}}

      <div class="form-group col-md-12">
          <label>Choise Image</label>
        <div class="input-group"> 
          <input name="Product_url" id="Product_url" type="file" class="form-control">  
        </div>
        </div>


      <div class="box-footer">
        {{--  <button type="submit" class="btn btn-default">Cancel</button>  --}}
        <button type="submit" class="btn btn-info pull-right">Save</button>
      </div>
  
    </form>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.box -->


{{--  show the category in DB  --}}





      <!-- /.box -->

      <div class="box tbshow">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
          @permission('product-create')
          <div class="text-right">

         
          <h3 class="box-title "> Add new Product 	<button type="button"  id='AddProduct' class='btn btn-link btn-sm '>
					                	<i id='' class=' fa fa-plus'></i>
          </button>
           </h3>
          </div>
          @endpermission
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Discraption</th>
                  <th>price</th>
                  <th>stock</th>
                  <th>color</th>
                    <th>category</th>  
                   <th>section</th>  
                  <th>Employee</th>
                  <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                   <tr>

                      <td>{{$product->id}}</td>
                  <td><img height="50px;" width="50px"  class="img-responsive" src="../../Upload/{{$product->url}}" alt=""></td>
                  <td>{{$product->products_title}}</td>
                  <td>{{$product->products_descraption}}</td>
                  <td>{{$product->products_price}}</td>
                  <td>{{$product->products_stock}}</td>
                  <td>{{$product->products_color}}</td>
                   <td>      
                      //  {{$product->categories_name}}
                  </td> 
                   <td> 
                      @foreach ($product->sections as $section )

                    {{$section->sections_name}} :
                        
                    @endforeach  

                   </td> 
                  <td>      
                 //   {{$product->name}}
                 </td> 

                 <td>
                    @permission('product-edit')
                  <a href='/Admin/Updateproduct/{{$product->id}}' class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>
                  @endpermission
                  @permission('product-delete')
                  <a  href='/Admin/Deleteproduct/{{$product->id}}' class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                  @endpermission
                </td>

             
                    </tr>

                    @endforeach 
           
           
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Discraption</th>
                <th>price</th>
                <th>stock</th>
                <th>color</th>
                 <th>category</th>  
                {{--  <th>section</th>  --}}
                <th>Employee</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->




@stop




