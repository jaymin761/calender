@extends('index')
@section('content')
<div class="content-wrapper">
        <section class="content">
            <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User Data</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($userData as $view)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$view->name}}</td>
                                    <td>{{$view->email}}</td>
                                    <td>
                                        <button class="btn btn-primary" disabled>@if ($view->roles){{$view->roles[0]->name}} @else -- @endif</button>
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit-permission',$view->id)}}" class="btn btn-info" >Edit</a>
                                        <a href="{{route('user.user-registration-show',$view->id)}}" class="btn btn-info" >View</a>
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
