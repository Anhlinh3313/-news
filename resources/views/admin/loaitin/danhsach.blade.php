@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>Danh sách loại tin</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr text-align="center">
                        <th >ID</th>
                        <th>Tên loai tin</th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaitin as $loaitins)
                    <tr class="odd gradeX" align="center">
                        <td>{{$loaitins->id}}</td>
                        <td>{{$loaitins->Ten}}</td>
                        <td>{{$loaitins->TenKhongDau}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa">Xoá</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection