@extends("templates.admin.master")
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý liên lạc của khác hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Quản lý liên lạc của khác hàng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh Sách liên lạc của khác hàng</h3>
            </div>
  
            <div id="notify_success" class=" notify success">
              @if (Session::has('msg'))
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">USERNAME</th>
                  <th class="text-center">PHONE</th>
                  <th class="text-center">EMAIL</th>
                  <th class="text-center">PRODUCT(IF ANY)</th>
                  <th class="text-center">CONTENT</th>
                  <th class="text-center">DATE</th>
                  <th class="text-center">ANSWERED</th>
                  <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($objContact as $value)
                    <tr id="delete-coloum-{{$value->id}}" data-id="{{ $value->id }}">
                  		<td class="text-center">{{ $value->id }}</td>
                  		<td class="text-center">{{ $value->name }}</td>
                  		<td class="text-center">{{ $value->phone}}</td>
                  		<td class="text-center">{{$value->email}}</td>
                  		<td class="text-center">
                      	@if ($value->product_id <> null)
		                  	@php
		                  		$arr = [
		                  			'name' => str_slug($value->product->name),
		                  			'id'   => $value->product_id,
		                  		]
		                  	@endphp
                      		<a href="{{ route('house.product.index',$arr) }}">{{$value->product->name}}</a>
                      	@endif
                      	</td>
                  		<td style="word-break: break-word;" class="text-center">
							<button style='font-weight:bold; text-transform: uppercase; background: none repeat scroll 0 0 #2f64da;border: medium none;color: #fff;padding: 6px 25px;' id="show_{{ $value->id}}" class="show_content" value="{{ $value->id}}">HIỆN NỘI DUNG</button>
							<button style='display: none;font-weight:bold; text-transform: uppercase; background: none repeat scroll 0 0 #2f64da;border: medium none;color: #fff;padding: 6px 25px;' id="hide_{{ $value->id}}" class="hide_content" value="{{ $value->id}}">ẨN NỘI DUNG</button>
							<br/>
							<p style='display: none;' id="content_{{ $value->id}}"> {{$value->message}} </p>
                  		</td>
                  		<td class="text-center">
                      		{{ Carbon\Carbon::createFromTimestamp(strtotime($value->created_at))->diffForHumans() }}
                      	</td>
                      	<td>
                      		  <select id="reply_{{ $value->id }}" data-id="{{ $value->id }}"class="target">
							    <option <?php if ($value->reply == 1 ) echo 'selected' ; ?> value="1">No Answered</option>
							    <option <?php if ($value->reply == 2 ) echo 'selected' ; ?> value="2">Answered</option>
							  </select>
                      	</td>
                  		<td class="text-center">
                        	<button class="btn btn-danger btn-xs" id="delete-product" value="{{$value->id}}">Xóa</button>
                      	</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
					<th class="text-center">ID</th>
					<th class="text-center">USERNAME</th>
					<th class="text-center">PHONE</th>
					<th class="text-center">EMAIL</th>
					<th class="text-center">PRODUCT(IF ANY)</th>
					<th class="text-center">CONTENT</th>
					<th class="text-center">DATE</th>
					<th class="text-center">ANSWERED</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <script type="text/javascript">
			$( ".target" ).change(function() {
		  		id 			= $(this).attr('data-id');
		  		reply_id 	= $( "#reply_"+id ).val();
			  	$.ajaxSetup({
			    	headers: {
			          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			  	});

		      	$.ajax({
	          		url : '{{ route('ajax_reply') }}',
		          	type : 'POST',
		          	data : {
	             	 	id : id,
	             	 	reply_id : reply_id,
		          	},
		          	success : function(data){
		              	if(data.success){
	                  		$('#notify_success').html('<div class=" notify success"><div class="alert alert-success">' + data.success + '</div></div>');
		                  	setTimeout(function(){location.href='{{ route('admin.contact.index') }}';},1000);
		              	} else {
		                  	$('#notify_success').html('<div class=" notify error"><div class="alert alert-danger">' + data.error + '</div></div>');
		                  	setTimeout(function(){location.href='{{ route('admin.contact.index') }}';},1000);
		              	}
			          }
		      	});
			});	
      </script>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Bạn có muốn xóa Blogs này không ? </h4>
                </div>
                <div class="modal-footer" id="add-body">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-outline" id="delete-save" data-id="">Xóa</button>
                   
                </div>
            </div>
        </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  	</div>
  	<script type="text/javascript">
		$('.show_content').click(function () {
			var id = $(this).val();
			$("#content_"+id).show();
			// $("#hide_"+id).show();
			$("#show_"+id).hide();
			$("#hide_"+id).show();
		});

		$('.hide_content').click(function () {
			var id = $(this).val();
			$("#content_"+id).hide();
			// $("#hide_"+id).show();
			$("#show_"+id).show();
			$("#hide_"+id).hide();
		});
  	</script>
@endsection