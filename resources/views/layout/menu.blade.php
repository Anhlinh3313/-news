 <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active" style="background-color: red;">
                    	Danh sách danh mục thông tin
                    </li>
                     @foreach($theloai as $theloais)
                     @if(count($theloais->loaitin)>0)
                    <li href="#" class="list-group-item menu1">
                    	{{$theloais->Ten}}
                    </li>
                    <ul>
                        @foreach($theloais->loaitin as $loaitins)
                		<li class="list-group-item">
                			<a href="loaitin">{{$loaitins->Ten}}</a>
                		</li>
                		@endforeach
                    </ul>
                    @endif
                    @endforeach
                </ul>
            </div>