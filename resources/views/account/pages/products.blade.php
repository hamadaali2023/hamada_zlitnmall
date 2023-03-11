@extends('account.homepage') @section('content')

<style>
  .select2-container{
    text-align: right !important;
  }
</style>

<!-- general form elements disabled -->
<div class=" ">
  <div style="display: none" class="box box-warning add_product ">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="box-header with-border">
      <h3 class="box-title">Add New product </h3>
      @permission('قراءة-المنتجات')
      <div class="text-right">
        <h3 class="box-title "> Show Product
          <button type="button" id='showProduct' class='btn btn-link btn-sm '>
            <i id='' class=' fa fa-plus'></i>
          </button>
        </h3>
      </div>
      @endpermission
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form method="post" action="{{url('/Admin/productsStore')}}" enctype="multipart/form-data" role="form">

        {{ csrf_field() }}

        <!-- select input -->
        <div class="form-group">
          <label>أختار التصنيف </label>
          <select name="Product_catogary" class="form-control select2"   style="width: 100%;">

            @foreach ($catogorys as $catogory)

            <option value="{{$catogory->id}}"> {{$catogory->categories_name}}</option>

            @endforeach
          </select>
        </div>


        <!-- select input -->
        <div class="">
          <label>أختار المحل</label>
          <select name="shop_id" class="form-control select2"   style="width: 100%;">

            @foreach ($shops as $shop)

            <option value="{{$shop->id}}"> {{$shop->shop_name}}</option>

            @endforeach
          </select>

        </div>
        <br>
        <br>


        <!-- text input -->
        <div class="form-group">
          <label>أسم المنتج</label>
          <input name="Product_Title" type="text" class="form-control" placeholder="أدخل ...">
        </div>


        <!-- textarea -->
        <div class="form-group">
          <label>وصف المنتج</label>
          <textarea name="Product_Descraption" class="form-control" rows="3" placeholder="أدخل ..."></textarea>
        </div>

        {{-- price --}}

        <div class="form-group">
          <label>سعر المنتج</label>
          <div class="input-group">

            <span class="input-group-addon">$</span>

            <input name="Product_price" type="text" class="form-control">
            <span class="input-group-addon">.00</span>
          </div>
        </div>

       
       
        
        <br> {{-- image --}}

        <div class="form-group col-md-12">
          <label>صورة المنتج</label>
          <div class="input-group">
            <input name="Product_url" id="Product_url" type="file" class="form-control">
          </div>
        </div>


        <div class="box-footer">
          {{--
          <button type="submit" class="btn btn-default">Cancel</button> --}}
          <button type="submit" class="btn btn-info pull-right">حفظ</button>
        </div>

      </form>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<!-- /.box -->


{{-- show the category in DB --}}





<!-- /.box -->

<div class="box tbshow">
  <div class="box-header">
    <h3 class="box-title"></h3>
    @permission('أنشاء-منتج')
    <div class="text-right">


      {{-- <h3 class="box-title ">إضافة منتج جديد 
        <button type="button" id='AddProduct' class='btn btn-link btn-sm '>
          <i id='' class=' fa fa-plus'></i>
        </button>
      </h3> --}}
    </div>
    @endpermission
  </div>
  <!-- /.box-header -->
  <div style="overflow-x:auto">
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>التسلسل</th>
          <th>صورة المنتج</th>
          <th>عنوان المنتج</th>
          <th>نبذة عن المنتج</th>
          <th>السعر </th>

          <th>المحل</th>
          <th>التصنيف</th>
          <th>المعلن</th>
          <th>حالة النشر </th>
          <th></th>

        </tr>
      </thead>
      <tbody>
        @foreach ($productts as $product )
        <tr>

          <td>{{$product->id}}</td>
          <td>
            <img height="50px;" width="50px" class="img-responsive" src="{{asset('/Upload/'.$product->url.'')}}" alt="">
          </td>
          <td>{{$product->products_title}}</td>
          <td>{{$product->products_descraption}}</td>
          <td>{{$product->products_price}}</td>

          <td>{{$product->shop_name}}</td>
          <td>
            {{$product->categories_name}}
          </td>

          <td>
            {{$product->name}}
          </td>
          <td>
            {{$product->Status}} @permission('السماح-بنشر-المنتج')
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal-{{$product->id}}">
              <i class='fa fa-edit'></i>
            </button>
            @endpermission




          </td>

          <td>
            {{-- @permission('تعديل-منتج')
            <a href='{{url('/Admin/Updateproduct/'.$product->id.'')}}' class='btn btn-info btn-sm'>
              <i class='fa fa-edit'></i>
            </a>
            @endpermission  --}}
            @permission('مسح-منتج')
            <a href='{{url('/Admin/Deleteproduct'.$product->id.'')}}' class='btn btn-danger btn-sm'>
              <i class="fa fa-trash"></i>
            </a>
            @endpermission
          </td>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$product->products_title}} تعديل الحالة</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="Role_form-{{$product->id}}" action="{{url('/Admin/product_Status/'.$product->id.'')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group ">
                      <select name="status" class="form-control select2" data-placeholder="Select a Status" style="width: 100%;">
                        <option value="0">أختار</option>
                        <option value="نشر">نشر</option>
                        <option value="عدم-النشر">عدم النشر</option>
                        <option value="مرفوض">مرفوض</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                  <button onclick="$('#Role_form-{{$product->id}}' ).submit()" type="button" class="btn btn-primary">حفظ التغيرات</button>
                </div>
              </div>
            </div>
          </div>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>
  <!-- /.box-body -->
</div>
<!-- /.box -->




@stop