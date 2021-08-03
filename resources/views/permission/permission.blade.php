@extends('index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Permission Insert
          </button>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <form action="{{route('user.permission-add')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permission name</label>
                        <input type="text" class="form-control" placeholder="Enter Permission name" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <form action="{{route('user.permission-update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="" id="updateid">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permission  name</label>
                        <input type="text" class="form-control" placeholder="Enter Permission name" name="name" value="{{old('name')}}" required id="rolename">
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permission</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Permission name</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($view as $permissionName)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$permissionName->name}}</td>
                                @can('permission_delete')
                                    <td><a href="{{route('user.permission-delete',$permissionName->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete')">Delete</a></td>
                                @endcan
                                @can('permission_edit')
                                    <td><button class="btn btn-info btnEdit"  data-id="{{$permissionName->id}}" data-toggle="modal" data-target="#exampleModalCenter1" >Edit</button></td>
                                @endcan
                            </tr>
                    @endforeach

                </tbody>
              </table>
              {{$view->links()}}

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('script')
      <script>
                  $(document).on('click','.btnEdit',function(){

                        var emailId=$(this).data('id');
                        $.ajax({
                                type:'get',
                                url:'{{route("user.permission-edit")}}',
                                data:{'id':emailId},
                                success:function(res)
                                {
                                    var nm=res.view.name;
                                    var id=res.view.id;
                                    $('#rolename').val(nm);
                                    $('#updateid').val(id);
                                }
                            })

                        })
      </script>
  @endpush
@endsection
