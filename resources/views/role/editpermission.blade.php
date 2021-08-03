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
                <h3 class="box-title">Quick Example</h3>
              </div>
              <form role="form" method="post" action="{{route('user.update-permission')}}" >
                @csrf
                <input type="hidden" name="id" value="{{$userData->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Role</label>
                        <select name="role" class="js-example-basic-single form-control" required style="width: 100%">
                            <option value="">Select Role</option>
                            @foreach ($viewRole as $dataRole)
                                        <option value="{{$dataRole->name}}" @if($userData->roles[0]->id==$dataRole->id) selected @endif>{{$dataRole->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$userData->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="update">
                    </div>
                </div>
              </form>
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
