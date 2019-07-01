@extends("templates.admin.master")
@section("content")
<div class="content-wrapper" style="min-height: 445px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa Blogs Mã {{ $objNews['id'] }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Sửa Blogs Mã {{ $objNews['id'] }}</li>
        </ol>
    </section>
    <div class="container" style="padding-top: 30px">
	<section class="content container-fluid">
	    <div class="box">
	        <div class="box-header">
	            <h3 class="box-title">Sửa Blogs Mã {{ $objNews['id'] }}</h3>
	        </div>
	        <div class="box-header">
                <div class="col-lg-12" style="padding-bottom:50px">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<form action="{{ route('admin.news.edit',[$objNews['id']]) }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">  
					{{ csrf_field() }}          
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label>Tiêu đề</label>
							  <input class="form-control" type="text" name="name" placeholder="Xin nhập tên sản phẩm" value="{{ $objNews['name'] }}">
							</div>
						   	<div class="form-group">
					            <label>Chi tiết</label>
					            <textarea class="form-control" name="detail" id="detail">{{ $objNews['detail'] }}</textarea>
					        </div>

                            <div class="form-group">
                              <label>Tình trạng bài viết</label>
                                <select class="form-control" name="active" id="active">
                                    <option value="">------ Xin chọn tình trạng bài viết ------ </option>
                                    @foreach ($objActive as $value)
                                        <option value="{{$value->id}}" @if($value->id == $objNews['active_id']) selected @endif>{{$value->name}} </option>
                                    @endforeach
                                </select>
                            </div>
						</div>
						<div class="col-md-8">
					    	<div class="col-md-6">
							    <div class="form-group">
							        <label>Hình đại điện</label>
							        <input type="file" style="display:none" id="upload-input_1" name="image_detail123" accept="image/*">
							        <div id="upload_1" class="form-control drop-area">
							            <h3>Kéo & thả ảnh vào đây ! </h3>
							            <button type="button" class="btn btn-primary btn-sm " id="btn_select123">hoặc click vào đây để chọn ảnh !</button>
							            <div id="thumbnail123" ></div>
							        </div>
							    </div>
							</div>
                            <div class="col-md-6">                                            
                                <div class="row form-group text-center">
                                    <label>Hình Cũ</label>
                                    <div style="height: 150px;" class="d-inline " id="listimage">
                                        <input type="hidden" name="id_del_image123" id="id_del_image123" >
                                        <div class="wp-image" id="{{ $objNews['image']}}">
                                            <img style='width: 100px;height: 100px;margin: 5px;' class="img-thumbnail123" src="{{asset('storage/app/public/files/show_news/'.$objNews['image'])}}"/>
                                      </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-md-12">
					    <div class="form-group">
					        <label>Mô tả</label>
					        <textarea class="form-control"  name="description">{{ $objNews['content'] }}</textarea>
					    </div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success">Lưu</button>
						<a href="{{ URL::previous() }}" class="btn btn-default">Quay lại</a>
					</div>
					</form>
                </div>
	        </div>
	    </div>
	</section>
    </div>
</div>
<script>
    jQuery(function($){
        var fileDiv = document.getElementById("upload_1");
        var fileInput = document.getElementById("upload-input_1");
        var btnSelect = document.getElementById('btn_select123');
        fileInput.addEventListener("change",function(e){
            var files = this.files
            console.log(files);
            showThumbnail123(files)
        },false)

        btnSelect.addEventListener("click",function(e){
            $(fileInput).show().focus().click().hide();
            e.preventDefault();
        },false)


        fileDiv.addEventListener("dragenter",function(e){
            e.stopPropagation();
            e.preventDefault();
        },false);

        fileDiv.addEventListener("dragover",function(e){
            e.stopPropagation();
            e.preventDefault();
        },false);

        fileDiv.addEventListener("drop",function(e){
            e.stopPropagation();
            e.preventDefault();
            var dt = e.dataTransfer;
            var files = dt.files;
            console.log(files);
            fileInput.files = files;
            showThumbnail123(files)
        },false);

        function showThumbnail123(files){
            $('.box-image123').remove();
            for(var i=0;i<files.length;i++){
                var file = files[i]

                var container = document.createElement('div');
                container.classList.add('box-image123');

                var image = document.createElement("img");
                image.classList.add("img-thumbnail123");
                image.file = file;
                container.appendChild(image);

                var thumbnail = document.getElementById("thumbnail123");
                thumbnail.appendChild(container);

                var reader = new FileReader()
                reader.onload = (function(aImg){
                    return function(e){
                        aImg.src = e.target.result;
                    };
                }(image))
                var ret = reader.readAsDataURL(file);
                var canvas = document.createElement("canvas");
                ctx = canvas.getContext("2d");
                image.onload= function(){
                    ctx.drawImage(image,100,100)
                }
            }
        };
    });
</script>
@endsection