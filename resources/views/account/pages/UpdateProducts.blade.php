@extends('account.homepage')

@section('content')



<!-- general form elements disabled -->
<div class="col-md-6 ">
<div  class="box box-warning  ">
  <div class="box-header with-border">
    <h3 class="box-title">Update  product </h3>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="{{url('/Admin/productsStore')}}" enctype="multipart/form-data" role="form">
       
      {{ csrf_field() }}
      <input type="hidden" name="product_id" value="{{$product->id}}">

        <!-- select input -->
        <div class="form-group">
          <label>Choise Category </label>
          <select value="{{$catName}}" name="Product_catogary" class="form-control " data-placeholder="Select a Category" style="width: 100%;">
            
            @foreach ($catogorys as $catogory)
                         
            <option value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>

             @endforeach
          </select>
        </div>


        <!-- select input -->
        <div class="form-group">
          <label>Choise Sections</label> <br>
        
          {{--  @foreach ($sections as $section)  
           

              <input name="product_section[]" value="{{$section->id}}" type="checkbox" class=""> {{$section->sections_name}}  <br>
         
           
            @endforeach  --}}
         
         
        </div>


      <!-- text input -->
      <div class="form-group">
        <label>Product Title</label>
        <input value="{{$product->products_title}}"  name="Product_Title"  type="text" class="form-control" placeholder="Enter ...">
      </div>
     

      <!-- textarea -->
      <div class="form-group">
        <label>Product Descraption</label>
        <textarea value="{{$product->products_descraption}}" name="Product_Descraption" class="form-control" rows="3"></textarea>
      </div>
      
      {{--  price  --}}

      <div class="form-group">
          <label>Product Price</label>
      <div class="input-group">
        
        <span class="input-group-addon">$</span>
      
       <input value="{{$product->products_price}}" name="Product_price" type="text" class="form-control">
        <span class="input-group-addon">.00</span>
      </div>
    </div>

      {{--  stock  --}}
      <div class="form-group col-md-6">
        <label>Stock </label>
      <div class="input-group"> 
        <input value="{{$product->products_stock}}"  name="Product_stock" type="number" class="form-control">  
      </div>
      </div>
      {{-- color --}}
      <div class="form-group col-md-6">
          <label >
            <input {{ $product->products_color=='Red' ? 'checked' :'' }} value="Red" name="Product_color" type="radio" class="minimal" >
            Red
          </label>
          <label >
            <input {{ $product->products_color=='Green' ? 'checked' :'' }}  value="Green"  name="Product_color" type="radio" class="minimal">
            Green
          </label>
          <label >
            <input {{ $product->products_color=='Blue' ? 'checked' :'' }} value="Blue" name="Product_color" type="radio" class="minimal" >
            Blue 
          </label>
          <br>
          <label >
            <input {{ $product->products_color=='Yellow' ? 'checked' :'' }} value="Yellow" name="Product_color" type="radio" class="minimal" >
            yellow
          </label>
          <label >
            <input {{ $product->products_color=='Black' ? 'checked' :'' }} value="Black" name="Product_color" type="radio" class="minimal">
           Black
          </label>
          <label >
            <input {{ $product->products_color=='White' ? 'checked' :'' }} value="White"  name="Product_color" type="radio" class="minimal" >
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
        <button type="submit" class="btn btn-info pull-right">Update</button>
      </div>
  
    </form>
  </div>
  <!-- /.box-body -->
</div>
</div>
<!-- /.box -->




@stop