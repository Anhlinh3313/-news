@extends('layout.index')

@section('content')
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:red; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Trang Loại Tin Thể Thao </h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        @foreach($theloai as $theloais)
                        @if(count($theloais->loaitin)>0)
                        <div class="row-item row">
                            <h3>
                                <a href="category.html">{{$theloais->Ten}}</a> | 
                                @foreach($theloais->loaitin as $loaitins)   
                                <small><a href="category.html"><i>{{$loaitins->Ten}}</i></a>/</small>
                                @endforeach           
                            </h3>
                            <?php
                            $data = $theloais->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                            $tin1 = $data->shift();
                            ?>
                            <div class="col-md-12 border-right">
                                <div class="col-md-5">
                                    <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                        <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                    </a>
                                </div>

                                <div class="col-md-7">
                                    <h3>{{$tin1['TieuDe']}}</h3>
                                    <p>{{$tin1['TomTat']}}</p>
                                    <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm tin <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            </div>
                            

                            <!-- <div class="col-md-4">
                                @foreach($data->all() as $tintuc)
                                <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                    <h4>
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        {{$tintuc["TieuDe"]}}
                                    </h4>
                                </a>
                                @endforeach
                                
                            </div> -->
                            
                            <div class="break"></div>
                        </div>
                        @endif
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
@endsection