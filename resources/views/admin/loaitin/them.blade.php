@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin Thể Thao
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                   <div class="alert alert-danger">
                      @foreach($errors->all() as $err)
                      {{$err}}<br>
                      @endforeach
                    </div>
                @endif 

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="admin/loaitin/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Thể Loại Thể Thao</label>
                        <select class="form-control" name="TheLoai">
                            @foreach($theloai as $theloais)
                               <option value="{{$theloais->id}}">{{$theloais->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin Thể Thao</label>
                        <input class="form-control" name="Ten" placeholder="Điều thôgn tin loại tin" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Loại Tin Thể Thao</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection