@extends('index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="{{route('user.role')}}" class="btn btn-info">Back</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
                <h3 class="box-title">User permission Show</h3>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>role</th>
                        <th>permission Allocated</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$userData->name}}</td>
                                <td>
                                    {{$userData->roles[0]->name}}
                                </td>
                                <td>
                                    @foreach ($user2 as $a )
                                      <button class="btn btn-primary" disabled>{{$a->name}}</button>
                                    @endforeach
                                </td>
                            </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection
