@extends("templates.admin.master")
@section("content")
<div class="content-wrapper" style="min-height: 445px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Blogs
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Thêm Blogs</li>
        </ol>
    </section>
    <div class="container" style="padding-top: 30px">
	<section class="content container-fluid">
	    <div class="box">
	        <div class="box-header">
	            <h3 class="box-title">Thêm Blogs</h3>
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
				<form action="{{ route('admin.news.add') }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">  
					{{ csrf_field() }}          
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label>Tiêu đề</label>
							  <input class="form-control" type="text" name="name" placeholder="Xin nhập tên sản phẩm" value="{{ old('name') }}">
							</div>
						   	<div class="form-group">
					            <label>Chi tiết</label>
					            <textarea class="form-control" name="detail" id="detail">{{ old('detail')}}</textarea>
					        </div>

                            <div class="form-group">
                              <label>Tình trạng bài viết</label>
                                <select class="form-control" name="active" id="active">
                                    <option value="">------ Xin chọn tình trạng bài viết ------ </option>
                                    @foreach ($objActive as $value)
                                        <option value="{{$value->id}}" @if(old('active') == $value->id) selected @endif>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
						</div>
						<div class="col-md-8">
					    	<div class="col-md-12">
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
						</div>
					</div>
					<div class="col-md-12">
					    <div class="form-group">
					        <label>Mô tả</label>
					        <textarea class="form-control"  name="description">{{ old('description') }}</textarea>
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
@endsection