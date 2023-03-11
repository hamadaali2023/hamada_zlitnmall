@extends('admin/homepage')
@section('contentpage')




@section('banar')
  الإعلانات
@endsection()

   <h3  class="col-xs-12"> أنشاء الإعلان <a href="{{url('admin/Adv ')}}"><button style="margin:10px;" id="cat" type="submit" class="btn btn-primary"> رجوع  </button></a></h1>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title">أنشاء الإعلان </h3>
                  </div>
                   <p class="text-warning">
                        @if(count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                      <div style="padding: 7px; margin-top: 20px; margin-right: 20px; font-size: 17px;" class="p-3 mb-2 bg-danger text-white">{{ $error }}</div>
                                @endforeach
                            </ul>
                         @endif
                     </p>
                      @if(session()->has('message'))
                        <div class="alert alert-success " style="padding: 5px; margin-top: 20px; margin-right: 20px; margin-right: 12px; font-size: 17px;">
                            {{ session()->get('message') }}
                        </div>
                      @endif

                 <form role="form" method="post" action="{{url('Admin/Adv/create')}}"  enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="box-body">
                        <input type="hidden" name="id" value="">
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1"> (إختياري)العنوان </label>
                            <input type="text" name="title" value="" class="form-control" id="exampleInputEmail1" placeholder="أعطى عنوان للإعلان">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">(إختياري) وصف الأعلان </label>
                            <input type="text" name="dis" value="" class="form-control" id="exampleInputEmail1" placeholder="أعطى وصف للاعلان">
                          </div>
                           <div class="form-group">
                            <label for="exampleInputEmail1"> ارفق صورةأو فديوالاعلان </label>
                            <input type="file" name="image" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter ">
                          </div>
                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary"> حفظ </button>
                          </div>
                      </div>
                  </form>
            </div>
          </div>
        </div>
    </section>
@stop
