@extends('backend.master')
@section('title','Slides')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{asset('admin/slide')}}">Slides</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

		
    <div class="card mb3">
        <div class="card-header">
            <i class="fas fa-edit"></i>
            Chỉnh sửa loại sản phẩm "{{$slideById->name}}"
        </div>
        @include('error.note')
        <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="card-body">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group" >
                        <label>Hình ảnh</label>
                        <input id="chooseImg" type="file" name="chooseImg" class="form-control" onchange="changeImg(this)">
                        <img id="avatar" class="thumbnail" width="300px" src="{{asset('/lib/storage/app/image/slide/'.$slideById->image)}}">
                    </div>
                    <div class="form-group" >
                        <label>Loại sản phẩm</label>
                        <input required type="text" name="txtSlideLink" class="form-control" value="{{$slideById->link}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="{{asset('admin/slide')}}" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>

@stop

