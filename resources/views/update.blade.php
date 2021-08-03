@extends('index')
@section('insert')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="updateform" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$view->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{$view->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">city</label>
                    <select  id="" class="form-control" name="city">
                        <option value="">Select City</option>
                        <option value="surat" @if($view->city=='surat') selected  @endif>Surat</option>
                        <option value="mumbai" @if($view->city=='mumbai') selected  @endif>mumbai</option>
                        <option value="vadodara" @if($view->city=='vadodara') selected  @endif>vadodara</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <textarea name="address" class="form-control">{{$view->address}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">gender</label>
                    <input type="radio" value="male" name="gender" @if($view->gender=='male') checked @endif>male
                    <input type="radio" value="female" name="gender" @if($view->gender=='female') checked @endif>female
                  </div>
                  @php
                      $hbby=explode(',',$view->hobby);
                  @endphp
                  <div class="form-group">
                    <label for="exampleInputEmail1">hobby</label>
                    <input type="checkbox" value="cricket" name="hobby[]" @if(in_array('cricket',$hbby)) checked @endif>cricket
                    <input type="checkbox" value="traveling" name="hobby[]" @if(in_array('traveling',$hbby)) checked @endif>traveling
                    <input type="checkbox" value="cooding" name="hobby[]" @if(in_array('Cooding',$hbby)) checked @endif>Cooding
                  </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="image" value="{{old('image')}}">
                  <img src="{{asset('upload/'.$view->image)}}" alt="" width="100px" height="100px">
                </div>
              </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" value="Submit" id="btnsubmit1">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('script')
        <script>
                $('#btnsubmit1').click(function(){

                    var form_data=new FormData($("#updateform")[0]);
                    $.ajax({
                            type:'post',
                            url:'{{route("user.update-data")}}',
                            contentType:false,
                            processData:false,
                            data:form_data,
                            success:function(res)
                            {
                                if(res==1)
                                {
                                    alert('Data submited');
                                    $('#insertform').trigger("reset");
                                }
                            }
                    })
                })
        </script>
  @endpush
@endsection
