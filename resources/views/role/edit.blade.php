@extends('index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-default">

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <form action="{{route('user.role-update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role name</label>
                        {{-- <input type="hidden" name="rolename" value="{{$user->id}}" required> --}}
                        <input type="text" class="form-control" placeholder="Enter Role name" name="name" value="{{$user->name}}" required id="rolename">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permission name</label>
                        <br>
                        <select name="permission[]" class="js-example-basic-single form-control" required multiple style="width: 100%">
                            <option value="">Select Permission</option>
                            @foreach ($viewPermission as $dataPermission )
                                        <option value="{{$dataPermission->id}}")
                                            @if(in_array($dataPermission->id,$roleData)) selected @endif>{{$dataPermission->name}}
                                        </option>
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
