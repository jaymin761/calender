@extends('index')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Repository Insert</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('user.repo.update',$editData->id)}}" method="post">
                @csrf
                @method('put')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$editData->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  placeholder="Enter email" name="email" value="{{$editData->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">city</label>
                    <input type="text" class="form-control"  placeholder="Enter city" name="city" value="{{$editData->city}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="text" class="form-control"  placeholder="Enter phone" name="phone" value="{{$editData->phone}}">
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

