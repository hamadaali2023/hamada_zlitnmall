@extends('account.homepage') @section('content') {{-- Interface.blade --}}
<div class="row">

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        {{--
        <h3>{{$users}}</h3> --}}

        <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="/Admin/user" class="small-box-footer">
        More info
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
        {{--
        <h3>{{$products}}</h3> --}}

        <p> Products </p>
      </div>
      <div class="icon">
        <i class="fa fa-product-hunt"></i>
      </div>
      <a href="/Admin/products" class="small-box-footer">
        More info
        <i class="fa fa-arrow-circle-right"></i>

      </a>
    </div>
  </div>
  <!-- ./col -->

</div>

<div class="row">

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        {{--
        <h3>{{$users}}</h3> --}}

        <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="/Admin/user" class="small-box-footer">
        More info
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
        {{--
        <h3>{{$products}}</h3> --}}

        <p> Products </p>
      </div>
      <div class="icon">
        <i class="fa fa-product-hunt"></i>
      </div>
      <a href="/Admin/products" class="small-box-footer">
        More info
        <i class="fa fa-arrow-circle-right"></i>

      </a>
    </div>
  </div>
  <!-- ./col -->

</div>




@stop