@extends("templates.admin.master")
@section("content")
<div class="content-wrapper" style="min-height: 445px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Slider Trang Chủ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Thêm Slider Trang Chủ</li>
        </ol>
    </section>
    <div class="container" style="padding-top: 30px">
            <section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Thêm Slider Trang Chủ</h3>
        </div>
        <div class="box-header">
           <div class="col-lg-12" style="padding-bottom:50px">
              <form action="{{ route('admin.slider.index.edit',$objSlider['id']) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <div class="row">
                    <div class="col-md-4">
                       	<div class="form-group">
                          	<label>Tên sản phẩm</label>
                          	<select  disabled="" class="form-control"name="product">
                          		<option value="{{$objSlider['id']}}">Mã: {{$objSlider['id']}} ---- {{ $objSlider->product->name}}</option>
                          </select>
                       	</div>
                       	<div class="form-group">
                          	<label>Trạng thái Slider</label>
	                          	<select class="form-control" name="active" id="active">
	                                <option value="">------ Xin chọn tình trạng slider ------ </option>
	                                @foreach ($objActive as $value)
	                                    <option value="{{$value->id}}" @if($objSlider['active_id'] == $value->id) selected @endif>{{ $value->name }}</option>
	                                @endforeach
	                            </select>
                       	</div>
                       	<div class="form-group">
                          	<label>Vị trí</label>
                          	<input class="form-control" type="number" value="{{$objSlider['position']}}" min="1" name="position" placeholder="Nhập vị trí">
                       	</div>
					    <div class="form-group">
					        <label>Hình hiển thị</label>
					        <input type="file" style="display:none" id="upload-input_1" name="image_detail123" accept="image/*">
					        <div id="upload_1" class="form-control drop-area">
					            <h3>Kéo & thả ảnh vào đây ! </h3>
					            <button type="button" class="btn btn-primary btn-sm " id="btn_select123">hoặc click vào đây để chọn ảnh !</button>
					            <div id="thumbnail123" >
                                    <span>Ảnh cũ</span> <br/>
                                    <img style="width: 100px;height: 100px;margin: 5px;" class="img-thumbnail123" src="{{ asset('/storage/app/public/files/slider_index/'.$objSlider['image']) }}">         
                                </div>
					        </div>
					    </div>
                    </div>
                    <div style='text-align: center;font-size: 30px;text-transform: uppercase;color: red;font-weight: bold;' class="col-md-8">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::has('msg'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{ Session::get('msg') }}
                                </ul>
                            </div>
                        @endif
                    </div>
                 </div>
                 <div class="text-center">
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm lại</button>
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