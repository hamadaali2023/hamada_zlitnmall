@extends('account.homepage')

@section('content')


<!-- general form elements disabled -->
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="box box-warning ">
  <div class="box-header with-border">
    <h3 class="box-title">Add New Section </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" action="/Admin/SectionsStore" role="form">
        {{ csrf_field() }}
      <!-- text input -->
      <div class="form-group">
        <label>Section  Name</label>
        <input name="Section_Name"  type="text" class="form-control" placeholder="Enter ...">
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
              <h3 class="box-title">All Sections</h3>

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
                
                </tr>
                  @foreach ($sections as $section )
                    
             

                <tr>
                  <td>{{$section->id}}</td>
                  <td>{{$section->sections_name}}</td>
                 
                 
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