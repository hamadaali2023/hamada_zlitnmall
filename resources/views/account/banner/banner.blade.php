@extends('admin.homepage')

@section('content')
<div class="row">
  <!-- general form elements disabled -->
  <div class="col-xs-12 col-md-12">

    <div class="box tbshow">
      <div class="col-xs-12 col-md-12 ">
        <div class="box">
          <a href="{{url('admin/Adv/create')}}" id='AddProduct' class='btn btn-link  '>
            <i id='' class=' fa fa-plus'></i> أنشاء إعلان
          </a>
          <!-- /.box-header -->
          <div class="box-body">

            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <th> العنوان </th>
                  <th>الوصف</th>
                  <th> البنر </th>
                  <th>تعديل / حذف</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($banners as $banner)
                <tr>
                  <td>{{ $banner->title }}</td>
                  <td>{{ $banner->dis }}</td>

                  <td><img src="{{asset('/upload/Adv/'. $banner->image )}}" height="50" width="50"></td>
                  <td class="">
                    <a href="{{url('/admin/Adv/'.$banner->id.'/edit')}}" class='btn btn-info btn-sm'>
                      <i class='fa fa-edit'></i>
                    </a>
                    <a href="{{url('/admin/Adv/'.$banner->id.'/delete')}}" class='btn btn-danger btn-sm'>
                      X
                    </a>

                  </td>
                </tr>
                @endforeach

              </tbody>

            </table>

            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>


  </div>

  @stop