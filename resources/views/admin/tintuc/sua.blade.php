@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức Thể Thao
                    <small>{{$tintuc->TieuDe}}</small>
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
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                             @foreach($theloai as $theloais)
                               <option  value="{{$theloais->id}}">
                               <!--  @if ($tintuc->loaitin->theloai->id==$theloais->id)
                               {{"selected"}}
                               @endif -->
                              {{$theloais->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                             @foreach($loaitin as $loaitins)
                               <option value="{{$loaitins->id}}">
                                <!-- @if($tintuc->loaitin->id==$loaitins->id)
                               {{"selected"}}
                               @endif -->
                               {{$loaitins->Ten}}</option>
                              @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Điều tiêu đề" value="{{$tintuc->TieuDe}}" />
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắm</label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img width="200px" src="upload/tintuc/{{$tintuc->Hinh}}"/></p>  
                        <input type="file" name="Hinh" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0"
                            @if($tintuc->NoiBat==0)
                                {{"checked"}}
                            @endif
                             type="radio">không      
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1"
                                 @if($tintuc->NoiBat==1)
                                 {{"checked"}}
                                 @endif
                              type="radio">có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
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