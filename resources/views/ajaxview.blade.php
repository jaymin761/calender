@extends('index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            @can('insert')
                <button class="btn btn-primary insert" data-toggle="modal" data-target=".bd-example-modal-lg">Insert</button>
            @endcan
            @can('deleteall')
                <button class="btn btn-danger" id="deleteallrecord">Delete all record</button>
            @endcan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
        <br>
        <div class="alert alert-success">
            <strong>Welcome</strong>   {{ Auth::user()->name }}
        </div>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Show</h3>
            </div>

        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form id="insertform" method="post">
                                @csrf
                        <div class="box-body">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control"  placeholder="Enter email" name="email"  id='mail' value="{{old('email')}}">
                                    <span class="errormsg" style="color: red"></span>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control"  placeholder="Enter password" name="password" value="{{old('password')}}">
                                </div>
                                @php
                                    $countryData=DB::table('countries')->get();
                                @endphp
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country</label>
                                    <select class="form-control country" name="country" >
                                        <option value="">Select Country</option>
                                        @foreach ($countryData as $view)
                                            <option value="{{$view->id}}">{{$view->countryname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">State</label>
                                    <select class="form-control state" name="state" >
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">city</label>
                                    <select class="form-control city" name="city">
                                        <option value="">Select city</option>
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
                                    <input type="checkbox" value="cricket" name="hobby[]">cricket
                                    <input type="checkbox" value="traveling" name="hobby[]">traveling
                                    <input type="checkbox" value="cooding" name="hobby[]">Cooding
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="image" value="{{old('image')}}">
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Submit" id="btnsubmit">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editform" method="post">
                        @csrf
                        <input type="hidden" name="id" id="userid">
                        <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name1" value="" id="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control"  placeholder="Enter email" name="email1" value="" id="email">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <select class="form-control country" name="country1">
                                <option value="">Select Country</option>
                                @foreach ($countryData as $view)
                                        <option value="{{$view->id}}">{{$view->countryname}}</option>
                                @endforeach
                            </select>
                            </div>
                            @php
                                $stateData=DB::table('states')->get();
                            @endphp
                            <div class="form-group">
                            <label for="exampleInputEmail1">State</label>
                            <select class="form-control state" name="state1">
                                <option value="">Select State</option>
                                @foreach ($stateData as $view)
                                    <option value="{{$view->id}}">{{$view->statename}}</option>
                                @endforeach
                            </select>
                            </div>
                            @php
                                $cityData=DB::table('cities')->get();
                            @endphp
                            <div class="form-group">
                            <label for="exampleInputEmail1">city</label>
                            <select class="form-control city" name="city1" >
                                <option value="">Select City</option>
                                @foreach ($cityData as $view)
                                    <option value="{{$view->id}}" >{{$view->cityname}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">address</label>
                            <textarea name="address1" class="form-control" id="address"></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">gender</label>
                            <input type="radio" value="male" name="gender1" id="gender1">male
                            <input type="radio" value="female" name="gender1" id="gender2">female
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">hobby</label>
                            <input type="checkbox" value="cricket" name="hobby1[]" id="hobby1">cricket
                            <input type="checkbox" value="traveling" name="hobby1[]" id="hobby2">traveling
                            <input type="checkbox" value="cooding" name="hobby1[]" id="hobby3">Cooding
                            </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image1" value="" >
                            <img src="" alt="" id="image" width="100px" height="100px">
                        </div>
                        </div>
                        <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="update" id="btnsubmit1">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" id="checkBoxAll"></th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Country</th>
                    <th>state</th>
                    <th>City</th>
                    <th>address</th>
                    <th>hobby</th>
                    <th>gender</th>
                    <th>image</th>
                    <th>action</th>
                    <th>action</th>
                    <th>EmailSend</th>
                </tr>
                </thead>
                </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@push('script')
    <script>

        $(document).on('change','.country',function(){
            var countryId=$(this).val();
            $.ajax({

                url:'{{route("user.country")}}',
                type:'get',
                data:{
                    id:countryId
                },
                success:function(res)
                {
                    if(res)
                    {

                        var stateData=res.state;
                        $('.state').html('<option value="">Select State</option>');
                        $.each(stateData,function(key,value){
                            $('.state').append('<option value='+value.id+'>'+ value.statename+'</option>');
                        })
                    }
                }
            })
        })
        $(document).on('change','.state',function(){

                var stateId=$(this).val();
                $.ajax({

                    url:'{{route("user.state")}}',
                    type:'get',
                    data:{
                        id:stateId
                    },
                    success:function(res)
                    {
                        if(res)
                        {
                            var cityData=res.city;
                            $('.city').html('<option value="">Select City</option>');
                            $.each(cityData,function(key,value){

                                $('.city').append('<option value='+value.id+'>'+ value.cityname+'</option>');
                            })
                        }
                    }
                })
            })
        $(function(){

            var table= $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax:'{{route("user.view") }}',
            columns: [
                { data: 'checkbox',orderable: false},
                { data: 'DT_RowIndex'},
                { data: 'name'},
                { data: 'email',searchable: false},
                { data: 'countryData'},
                { data: 'stateData'},
                { data: 'cityData'},
                { data: 'address'},
                { data: 'hobby',orderable: false},
                { data: 'gender',orderable: false},
                { data: 'images',orderable: false},
                { data: 'delete',orderable: false},
                { data: 'edit',orderable: false},
                { data: 'emailsend',orderable: false},

            ]
            });
        })
        $(document).on('click','.emailbtn',function(){

            var emailId=$(this).data('emailid');
            $(this).html('Sending...');
            var element=this;

            $.ajax({
                    type:'get',
                    url:'{{route("user.email-send")}}',
                    data:{'id':emailId},
                    success:function(res)
                    {
                        if(res)
                        {
                            $(element).html('Send Email');
                            var nm=res.name;
                            toastr.success(nm   + 'Email Send  succesfully');
                        }
                    }
                })

        })

            $(document).on('click','.insert',function(){
                $('#insertform').trigger("reset");
                $('.error-remove').remove();

            });

            $(document).on('click','#checkBoxAll',function(){

                $('.checkBoxClass').prop('checked',$(this).prop('checked'));


            });
            $(document).on('click','#deleteallrecord',function(){

                var allids=[];
                var element=this;
                var check =$('input[name=ids]:checked').length;

                if(check==0)
                {
                    toastr.error('Select atleast one');
                }
                else
                {
                    if(confirm('are you sure delete '))
                    {
                        $('input[name=ids]:checked').each(function(){
                            allids.push($(this).val());
                        })
                        $.ajax({

                            url:'{{route("user.delete-all")}}',
                            type:"get",
                            data:{
                                    id:allids
                            },
                            success:function(res)
                            {
                                toastr.success('Data Delete succesfully');
                                $(element).closest("tr").fadeOut();
                                $('#checkBoxAll').prop('checked',false);
                                $('#myTable').DataTable().ajax.reload();
                            }
                        })
                    }
                }
            });

            // function tblLoad()
            // {

            //     $.ajax({
            //         type:'get',
            //         url:'{{route("user.view")}}',
            //         success:function(res)
            //         {
            //                 var result=res.view;
            //                 var bodyData = '';

            //                 $.each(result,function(index,row){

            //                         bodyData+="<tr>"
            //                         bodyData+="<td>"+row.id+"</td>"
            //                         bodyData+="<td>"+row.name+"</td>"
            //                         bodyData+="<td>"+row.email+"</td>"
            //                         bodyData+="<td>"+row.city+"</td>"
            //                         bodyData+="<td>"+row.address+"</td>"
            //                         bodyData+="<td>"+row.hobby+"</td>"
            //                         bodyData+="<td>"+row.gender+"</td>"
            //                         bodyData+="<td><img src='upload/"+row.image+"' width='100px' height='100px'></td>"
            //                         bodyData+="<td><button class='btn btn-danger deletebtn' data-id='"+row.id+"'  >Delete</button></td>"
            //                         bodyData+="<td><button class='btn btn-info editbtn' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' data-eid='"+row.id+"' >edit</button></td>"
            //                         bodyData+="<tr>";
            //                 });
            //                 $("#tbl_data").html(bodyData);
            //         }
            //     })
            // }
            // tblLoad();

            $("#insertform").validate({
                    rules: {
                    name: {
                            required: true,
                        },
                    email: {
                            required: true,
                            email: true,
                        //    remote:{
                        //        url:'{{route("user.check-email")}}',
                        //        type:'post',
                        //        data:{
                        //                 mail:$('#mail').val()
                        //        },
                        //    }
                        },
                    password: {
                            required: true,
                            minlength:6,
                            maxlength:12,
                        },
                    country: {
                            required: true,
                        },
                        state: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },
                    address: {
                            required: true,
                        },
                    'hobby[]': {
                            required: true,
                        },
                    image: {
                            required: true,
                        },

                    },
                    messages: {
                            name: {
                                        required: "Please Enter name",
                                        minlength:3,
                                },
                            email: {
                                        required: "Please Enter email",
                                        email:'Please enter valid email',
                                        remote: "This email allready register!",
                                },
                            password: {
                                        required: "Please Enter password",
                                        minlength:"Password must be min 6",
                                        maxlength:"Password must be maximum 12",
                                },
                            country: {
                                        required: "Please Enter country"
                                },
                            state: {
                                        required: "Please Enter state"
                                },
                            city: {
                                        required: "Please Enter city"
                                },
                            address: {
                                        required: "Please Enter address"
                                },
                            'hobby[]': {
                                        required: "Please Enter hobby"
                                },
                            image: {
                                        required: "Please Enter image"
                                },
                        },
                    submitHandler:function (form) {

                                    $('.error-remove').remove();
                                    var form_data=new FormData(form);
                                    $.ajax({
                                            type:'post',
                                            url:'{{route("user.insert-data")}}',
                                            contentType:false,
                                            processData:false,
                                            data:form_data,
                                            success:function(res)
                                            {

                                                if(res)
                                                {
                                                    var nm=res.name;
                                                    // tblLoad();
                                                    $('#myTable').DataTable().ajax.reload();
                                                    $('#myModal').modal('hide');
                                                    toastr.success(nm + 'insert succesfully');
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
                                return false;
                            }
            });

            $("#editform").validate({
                    rules: {
                    name1: {
                            required: true,
                        },
                    email1: {
                            required: true,
                            email: true,
                        },
                    country1: {
                            required: true,
                        },
                    state1: {
                            required: true,
                        },
                    city1: {
                            required: true,
                        },
                    address1: {
                            required: true,
                        },
                    'hobby1[]': {
                            required: true,
                        },


                    },
                    messages: {
                            name1: {
                                        required: "Please Enter name",
                                        minlength:3,
                                },
                            email1: {
                                        required: "Please Enter email",
                                        email:'Please enter valid email',
                                },
                        country1: {
                                        required: "Please Enter country"
                                },
                            state1: {
                                        required: "Please Enter state"
                                },
                            city1: {
                                        required: "Please Enter city"
                                },
                            address1: {
                                        required: "Please Enter address"
                                },
                            'hobby1[]': {
                                        required: "Please Enter hobby"
                                },

                        },
                    submitHandler: function (form) {

                        $('.error-remove1').remove();

                        var form_data2=new FormData(form);
                        $.ajax({
                                type:'post',
                                url:'{{route("user.update-data")}}',
                                contentType:false,
                                processData:false,
                                data:form_data2,
                                success:function(res)
                                {
                                    if(res)
                                    {
                                        var nm=res.name;
                                        $('#myTable').DataTable().ajax.reload();
                                        $('#exampleModal').modal('hide');
                                        toastr.success(nm + 'Data  update succesfully');
                                        $('#editform').trigger("reset");
                                        // tblLoad();
                                    }
                                },
                                error:function(res)
                                {

                                    var errors = res.responseJSON.errors;
                                    $.each(errors,function(key,value){
                                        $("[name^="+ key +"]").closest(".form-group").append("<div class='text-danger error-remove1'>"+ value +"</div>");
                                    })
                                }
                        })
                        return false;
                    }
            });
        $(document).on('click','.deletebtn',function(){

            if(confirm('are you sure delete'))
            {
                var delete_id=$(this).data('id');
                var element=this;
                $.ajax({
                    type:'get',
                    url:'{{route("user.delete")}}',
                    data:{'id':delete_id},
                    success:function(res)
                    {
                        if(res)
                        {
                            var nm=res.name;
                            $(element).closest("tr").fadeOut();
                            $('#myTable').DataTable().ajax.reload();
                            toastr.success(nm + 'Data Delete succesfully');

                        }
                    }
                })
            }
        })

        $(document).on('click','.editbtn',function(){

            $('#editform').trigger("reset");
            $('.error-remove1').remove();

            var edit_id=$(this).data('eid');
            $.ajax({
                type:'get',
                url:'{{route("user.edit")}}',
                data:{'id':edit_id},
                success:function(res)
                {
                        var result=res.view;
                        $('#userid').val(result.id);
                        $('#name').val(result.name);
                        $('#email').val(result.email);

                        if(result.gender=='male')
                        {
                            $('#gender1').prop('checked',true);
                        }
                        else
                        {
                            $('#gender2').prop('checked',true);
                        }

                        $('.country').val(result.country_id);
                        $('.state').val(result.state_id);
                        $('.city').val(result.city_id);

                        var propety=result.image;
                        $('#image').attr('src',propety);

                        var hobbies = result.hobby;
                        var hobbies_res = hobbies.split(",");

                        for(var i=0;i<hobbies_res.length;i++){

                            if(hobbies_res[i]=='cricket'){
                                $("#hobby1").prop('checked',true);
                            }
                            if(hobbies_res[i]=='traveling'){
                                $("#hobby2").prop('checked',true);
                            }
                            if(hobbies_res[i]=='cooding'){
                                $("#hobby3").prop('checked',true);
                            }
                        }
                        $('#address').val(result.address);
                }
            })
    })
    </script>
@endpush
@endsection
