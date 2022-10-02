@extends('admin.layouts.app')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>{{$title}}</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div id="crudTable_wrapper" class="mb-2">
        <table class="table table-hover text-wrap bg-white ">
            <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 150px;">Option</th>
            </tr>
            </thead>
            <tbody>

                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{\App\Models\Enums\Role::search($user->role)}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
            </tbody>
        </table>

        <div class="row mt-2">
{{--            <div class="col-sm-12 col-md-4">--}}
{{--            </div>--}}
{{--            <div class="col-sm-0 col-md-4 text-center">--}}
{{--            </div>--}}
            <div class="col-sm-12 col-md-4">
                {!! $users->appends(request()->all())->links() !!}
            </div>
        </div>
    </div>
@endsection