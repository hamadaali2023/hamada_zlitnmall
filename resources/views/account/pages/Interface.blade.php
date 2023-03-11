@extends('account.homepage') @section('content') {{-- Interface.blade --}}
<div class="row">
  
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        
        <h3>{{$cites}}</h3>

        <p>مدن </p>
      </div>
      <div class="icon">
        <i class="fa fa-city"></i>
      </div>
      <a href="{{url('/Admin/Cites')}}" class="small-box-footer">
        لمزيد من المعلومات 
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        
        <h3>{{$shops}}</h3>

        <p>محلات </p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="{{url('/Admin/shops')}}" class="small-box-footer">
        لمزيد من المعلومات 
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        
      <h3>{{$products}}</h3>

        <p> منتجات  </p>
      </div>
      <div class="icon">
        <i class="fab fa-product-hunt"></i>
      </div>
      <a href="{{url('/Admin/products')}}" class="small-box-footer">
        لمزيد من المعلومات 
        <i class="fa fa-arrow-circle-right"></i>

      </a>
    </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        
        <h3>{{$users}}</h3>

        <p>مستخدين </p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{url('/Admin/user')}}" class="small-box-footer">
        لمزيد من المعلومات 
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->

</div>










@stop