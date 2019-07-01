@extends("templates.admin.master")
@section("content")
<div class="content-wrapper" style="min-height: 445px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Pages
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i>Admin</a></li>
            <li class="active">Thêm Pages</li>
        </ol>
    </section>
    <div class="container" style="padding-top: 30px">
	<section class="content container-fluid">
	    <div class="box">
	        <div class="box-header">
	            <h3 class="box-title">Thêm Pages</h3>
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
				<form action="{{ route('admin.pages.edit',$objPages['id']) }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">  
					{{ csrf_field() }}          
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label>Tiêu đề</label>
							  <input class="form-control" type="text" name="name" placeholder="Xin nhập tên tiêu đề" value="{{$objPages['name']}}">
							</div>
						</div>
					</div>
                    <div class="row">
    					<div class="col-md-12">
    					    <div class="form-group">
    					        <label>Mô tả</label>
    					        <textarea class="form-control"  name="description">{{$objPages['content']}} </textarea>
    					    </div>
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