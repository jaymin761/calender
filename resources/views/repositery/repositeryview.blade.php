@extends('index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
            <a href="{{route('user.repo.create')}}" class="btn btn-primary">Insert</a>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
                <h3 class="box-title">Repository Show Data</h3>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>city</th>
                        <th>phone</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($allUser as $view)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$view->name}}</td>
                                <td>{{$view->email}}</td>
                                <td>{{$view->city}}</td>
                                <td>{{$view->phone}}</td>
                                <td><a href="{{route('user.repo.edit',$view->id)}}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('user.repo.destroy',$view->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You sure Deleted')">Delete</button>
                                    </form>
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
@endsection
