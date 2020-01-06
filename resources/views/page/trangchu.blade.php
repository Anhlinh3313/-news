@extends('layout.index')

@section('content')
<div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="admin_asset/slidehinh/1.jpg" alt="" width="20px">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="admin_asset/slidehinh/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="admin_asset/slidehinh/3.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
           
             @include('layout.menu')
            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:red; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Trang thông tin</h2>
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
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="detail.html">
			                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{$tin1['TieuDe']}}</h3>
			                        <p>{{$tin1['TomTat']}}</p>
			                        <a class="btn btn-primary" href="detail.html">Xem thêm tin <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>
		                    

							<div class="col-md-4">
								@foreach($data->all() as $tintuc)
								<a href="detail.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{$tintuc["TieuDe"]}}
									</h4>
								</a>
								@endforeach
								
							</div>
							
							<div class="break"></div>
		                </div>
		                @endif
		                @endforeach
		                <!-- end item -->
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
</div>
@endsection