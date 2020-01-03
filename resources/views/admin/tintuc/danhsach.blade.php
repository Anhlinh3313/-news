@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức Thể Thao
                    <small>Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Tóm Tắt</th>
                        <th>Số Lượt Xem</th>
                        <th>Nổi Bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tintucs)
                        <tr class="odd gradeX" align="center">
                            <td>{{$tintucs->id}}</td>
                            <td>
                                <p>{{$tintucs->TieuDe}}</p>
                                <img width="100px" src="upload/tintuc/{{$tintucs->Hinh}}"/>
                            </td>
                            <td>{{$tintucs->TomTat}}</td>
                            <td>{{$tintucs->SoLuotXem}}</td>
                            <td>
                                @if($tintucs->NoiBat == 0)
                                {{'không'}}
                                @else
                                {{'có'}}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tintucs->id}}">Xoá</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tintucs->id}}">Sửa</a></td>
                            </tr>
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