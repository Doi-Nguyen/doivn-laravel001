@extends('admin.home')

@section('css-link')
    <link href="{{asset('/css/admin/user/index.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Quản Lý User
                </div>

                <div class="panel-body table-user">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Slogan</th>
                                <th>Role</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->slogan}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->birthday}}</td>
                                    <td>{{$user->gender}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection