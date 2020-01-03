@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
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
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                             @foreach($theloai as $theloais)
                               <option value="{{$theloais->id}}">{{$theloais->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                             @foreach($loaitin as $loaitins)
                               <option value="{{$loaitins->id}}">{{$loaitins->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Điều tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắm</label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" name="Hinh" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" checked="" type="radio">không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" type="radio">có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
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
@section('script')
   <script>
       $(document).ready(function(){
        $("#TheLoai").change(function(){
            var idTheLoai= $(this).val();
            $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                $("#LoaiTin").html(data);
            });
        });
       });
   </script>

@endsection