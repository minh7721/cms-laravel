@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <table>
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tiêu đề ảnh</th>
            <th>Url</th>
            <th>Hình ảnh</th>
            <th>Sắp xếp</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 100px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td>{{$slider->thumb}}</td>
                <td>{{$slider->sort_by}}</td>
                <td>{!! Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/slider/edit/{{$slider->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/admin/slider/" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$slider->id}}, '/admin/slider/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    {!! $products->links() !!}--}}
@endsection
