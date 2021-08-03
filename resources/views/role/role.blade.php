@extends('index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @can('role_insert')

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Role Insert
            </button>
        @endcan
    </section>
    @if (Session::has('role_error'))
        <section class="content-header">
            <div  class='alert alert-success'>{{session('role_error')}}</div>
        </section>
    @endif
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <form action="{{route('user.role-add')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role name</label>
                        <input type="text" class="form-control" placeholder="Enter Role name" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permission name</label>
                        <br>
                        <select name="permission[]" class="js-example-basic-single form-control" required multiple style="width: 100%">
                            <option value="">Select Permission</option>
                            @foreach ($viewPermission as $dataPermission )
                                        <option value="{{$dataPermission->id}}">{{$dataPermission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($view as $roleName)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$roleName->name}}</td>
                                <td>
                                    @can('role_delete')
                                        <a href="{{route('user.role-delete',$roleName->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete')">Delete</a>
                                    @endcan
                                    @can('role_edit')
                                        <a href="{{route('user.role-edit',$roleName->id)}}" class="btn btn-info" >Edit</a>
                                    @endcan
                                    @can('role_view')
                                        <a href="{{route('user.role-view',$roleName->id)}}" class="btn btn-info" >View</a>
                                    @endcan

                                </td>
                            </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('script')
      <script>
          $(document).ready(function() {
                 $('.js-example-basic-single').select2();
            });
      </script>
  @endpush
@endsection
