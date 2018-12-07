@extends('account.homepage')

@section('content')


<div class="row">
<!-- general form elements disabled -->
<div class="col-xs-12 col-md-6">
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Add New Category </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="/Admin/CategoriesStore" role="form">
        {{ csrf_field() }}
      <!-- text input -->
      <div class="form-group">
        <label>Category Name</label>
        <input name="Category_Name"  type="text" class="form-control" placeholder="Enter ...">
      </div>
     

      <!-- textarea -->
      <div class="form-group">
        <label>Category Descraption</label>
        <textarea name="Category_Descraption" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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


        <div class="col-xs-12 col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Categories</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Discraption</th>
                </tr>
                @foreach ($categorys as $category )
                    
             

                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->categories_name}}</td>
                  <td>{{$category->categories_descraption}}</td>
                 
                </tr>
                @endforeach
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>

@stop