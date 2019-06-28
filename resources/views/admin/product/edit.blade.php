@extends("templates.admin.master")
@section("content")
<div class="content-wrapper" style="min-height: 445px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Sửa Sản phẩm</li>
        </ol>
    </section>
    <div class="container" style="padding-top: 30px">
	<section class="content container-fluid">
	    <div class="box">
	        <div class="box-header">
	            <h3 class="box-title">Sửa sản phẩm</h3>
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
                <form action="{{ route('admin.product.edit',[$objProduct['id']]) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                    {{ csrf_field() }}          
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Thể loại</label>
                                <select class="form-control" name="choose_id" id="choose">
                                <option value="">Xin chọn thể loại</option>
                                    @foreach ($objChoose as $value)
                                        <option value="{{$value->id}}" @if($value->id == $objProduct['choose_id']) selected @endif>{{$value->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="form-group">
                              <label>Danh Mục</label>
                                <select class="form-control" name="collection_id" id="collection">
                                <option value="">Xin chọn danh mục..</option>
                                    @foreach ($objCollection as $value)
                                        <option value="{{$value->id}}" @if($value->id == $objProduct['collection_id']) selected @endif>{{$value->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="form-group">
                              <label>Tiêu đề</label>
                              <input class="form-control" type="text" name="name" placeholder="Xin nhập tên sản phẩm" value="{{ $objProduct['name'] }}">
                           </div>
                           <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea class="form-control" name="detail" id="detail">{{ $objProduct['detail'] }}</textarea>
                            </div>
                            <div class="form-group" style="margin-bottom: 5em;">
                                <label>Thông số kỹ thuật</label>
                                <table class="table configuration">
                                    @if(json_decode($objProduct['configuration'], true))
                                    <?php
                                      $configurations = json_decode($objProduct['configuration'], true);
                                      ?>
                                    @endif
                                    @forelse($configurations as $key=>$value)
                                        @php
                                            if($key == 0) $properties = "Số phòng tắm";
                                                else if($key == 1) $properties = "Số phòng ngủ";
                                                    else if($key == 2) $properties = "Diện tích";
                                        @endphp
                                        <tr>
                                            <td width="120px">
                                                <input class="form-control" disabled="" value="{{ $properties }}"/>
                                            </td>
                                            <td>    
                                                <input class="form-control" name='configuration[]' type='text' value="{{ $value }}"/>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                   {{--  <tr>        
                                        <td width="120px"><input disabled=""value="Số phòng tắm" class="form-control" name="type='text'"></td>
                                        <td><input class="form-control" name="configuration[]" type="text"></td>
                                    </tr>

                                    <tr>        
                                        <td width="120px"><input disabled=""value="Số phòng ngủ" class="form-control" name="type='text'"></td>
                                        <td><input class="form-control" name="configuration[]" type="text"></td>
                                    </tr>

                                    <tr>        
                                        <td width="120px"><input disabled=""value="Diện tích" class="form-control" name="type='text'"></td>
                                        <td><input class="form-control" name="configuration[]" type="text"></td>
                                    </tr> --}}
                                </table>
                                <button id="btn-add" type="button" class="btn btn-sm btn-primary pull-left">
                                    <span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Hình ảnh Mô tả</label>
                                    <div class="row form-group text-center">
                                       <div style="height: 150px;" class="d-inline " id="listimage">
                                          <input type="hidden" name="id_del_image" id="id_del_image" >
                                          @foreach($ImageProduct as $img)
                                          <div class="wp-image" id="{{$img->id}}">
                                             <img style='max-width: 120px !important; max-height: 120px !important;' class="img-thumbnail  listimage-edit" src="{{asset('storage/app/public/files/detail_image/'.$img->image_detail)}}"/>
                                          </div>
                                          @endforeach
                                       </div>
                                    </div>
                                    <input type="file" style="display:none" id="upload-input" multiple="multiple" name="image_detail[]" accept="image/*">
                                    <div id="upload" class="form-control drop-area">
                                       <h3>Kéo & thả ảnh vào đây ! </h3>
                                       <button type="button" class="btn btn-primary btn-sm " id="btn_select">hoặc click vào đây để chọn ảnh !</button>
                                       <div id="thumbnail" ></div>
                                    </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Hình đại điện</label>
                                    <input type="file" style="display:none" id="upload-input_1" multiple="multiple" name="image_detail123" accept="image/*">
                                    <div id="upload_1" class="form-control drop-area">
                                       <h3>Kéo & thả ảnh vào đây ! </h3>
                                       <button type="button" class="btn btn-primary btn-sm " id="btn_select123">hoặc click vào đây để chọn ảnh !</button>
                                       <div id="thumbnail123" ></div>
                                    </div>

                                    <div class="row form-group text-center">
                                       <div style="height: 150px;" class="d-inline " id="listimage">
                                          <input type="hidden" name="id_del_image123" id="id_del_image123" >
                                          <div class="wp-image" id="{{ $objProduct['image']}}">
                                             <img style='width: 100px;height: 100px;margin: 5px;' class="img-thumbnail123" src="{{asset('storage/app/public/files/show_image/'.$objProduct['image'])}}"/>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Quận</label>
                                    <select class="form-control" name="district_id" id="district">
                                    <option value="">------ Xin chọn quận ------ </option>
                                        @foreach ($objDistrict as $value)
                                            <option value="{{$value->id}}" @if($value->id == $objProduct['district_id']) selected @endif>{{$value->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label>Địa chỉ</label>
                                  <input class="form-control" type="text" name="address" placeholder="Xin nhập địa chỉ" value="{{ $objProduct['address'] }}">
                                </div>

                                <div class="form-group">
                                  <label>Giá tiền</label>
                                  <input class="form-control" type="text" name="price" placeholder="Xin nhập giá" value="{{ $objProduct['price'] }} ">
                                </div>

                                <div class="form-group">
                                  <label>Tình trạng bài viết</label>
                                    <select class="form-control" name="active" id="active">
                                        <option value="">------ Xin chọn tình trạng bài viết ------ </option>
                                        @foreach ($objActive as $value)
                                            <option value="{{$value->id}}" @if($value->id == $objProduct['active_id']) selected @endif>{{$value->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control"  name="description">{{$objProduct['content'] }}</textarea>
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
    
    $('#btn-add').on('click',function(){
        $('table.configuration').append(
            '    <tr>' +
            '        <td width="120px"><input class="form-control" name=\ type=\'text\' /></td>\n' +
            '        <td><input class="form-control" name=\'configuration[]\' type=\'text\' /></td>\n' +
            '    </tr>'
        );
    });

    //show list image - buuton del image
    $('img.listimage-edit').each(function(){
        $(this).after('<button type="button" class="btn btn-danger glyphicon glyphicon-remove del"></button>');
    });
    var list_id = [];
    $('button.del').on('click',function(){
        $(this).parent().remove();
        var id = $(this).parent().attr('id');
        list_id.push(id);
        $('#id_del_image').val(list_id);
    });


    jQuery(function($){
        var fileDiv = document.getElementById("upload");
        var fileInput = document.getElementById("upload-input");
        var btnSelect = document.getElementById('btn_select');
        fileInput.addEventListener("change",function(e){
            var files = this.files
            console.log(files);
            showThumbnail(files)
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
            showThumbnail(files)
        },false);

        function showThumbnail(files){
            $('.box-image').remove();
            for(var i=0;i<files.length;i++){
                var file = files[i]

                var container = document.createElement('div');
                container.classList.add('box-image');

                var image = document.createElement("img");
                image.classList.add("img-thumbnail");
                image.file = file;
                container.appendChild(image);

                var thumbnail = document.getElementById("thumbnail");
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