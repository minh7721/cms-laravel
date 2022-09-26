@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/users/create" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
            <div class="form-group">
                <input value="{{ $search }}" type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên user cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>
    <table>
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
                <td>{{$user->role->name}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{$user->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$user->id}}, '/admin/users/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $users->appends(request()->all())->links() !!}
@endsection
