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
            <form role="form" id="insertform" method="post">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control"  placeholder="Enter password" name="password" value="{{old('password')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">city</label>
                    <select  id="" class="form-control" name="city">
                        <option value="">Select City</option>
                        <option value="surat">Surat</option>
                        <option value="mumbai">mumbai</option>
                        <option value="vadodara">vadodara</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <textarea name="address" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">gender</label>
                    <input type="radio" value="male" name="gender" checked>male
                    <input type="radio" value="female" name="gender">female
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">hobby</label>
                    <input type="checkbox" value="cricket" name="hobby[]">male
                    <input type="checkbox" value="traveling" name="hobby[]">traveling
                    <input type="checkbox" value="cooding" name="hobby[]">Cooding
                  </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="image" value="{{old('image')}}">
                </div>
              </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" value="Submit" id="btnsubmit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('script')
        <script>
                $('#btnsubmit').click(function(){

                    var form_data=new FormData($("#insertform")[0]);
                    $.ajax({
                            type:'post',
                            url:'{{route("user.insert-data")}}',
                            contentType:false,
                            processData:false,
                            data:form_data,
                            success:function(res)
                            {
                                if(res==1)
                                {
                                    swal("Data delete Succesfully");
                                    $('#insertform').trigger("reset");
                                }
                            },
                            error:function(response)
                            {
                                var error = response.responseJSON.errors;

                                $.each(error,function(key,value){
                                  $("[name^="+ key +"]").closest(".form-group").append("<div class='text-danger error-remove'>"+ value +"</div>");
                                })
                            }
                    })
                })
        </script>
  @endpush
@endsection
