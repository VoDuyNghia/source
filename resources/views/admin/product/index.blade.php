@extends("templates.admin.master")
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index.index') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Sản phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý sản phẩm</h3>
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
                  <th class="text-center">MÃ SẢN PHẨM</th>
                  <th class="text-center">TÊN BÀI VIẾT (EN)</th>
                  <th class="text-center">HÌNH ẢNH</th>
                  <th class="text-center">DANH MỤC</th>
                  <th class="text-center">TRẠNG THÁI</th>
                  <th class="text-center">
                      <a href="{{ route('admin.product.add') }}" class="btn btn-sm btn-success">
                          <span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm
                      </a>
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($objProduct as $value)
                    <tr id="delete-coloum-{{$value->id}}" data-id="{{ $value->id }}">
                      <td class="text-center">{{ $value->id }}</td>
                      <td class="text-center">{{ $value->code }}</td>
                      <td>{{ $value->name}}</td>
                      <td class="text-center"><img width="100px" height="100px" class="img img-thumbnail" src="{{ asset('public/image/files/show_image/'.$value->image)}}"></td>
                      <td class="text-center">{{$value->collection->name}}</td>
                      <td  id="trangthai_{{$value->id}}" class="text-center">
                          <div class="row">
                              @if ($value->active_id == 0)
                                <a href="javascript:void()">
                                  <img src="http://event.titans.mu/event/image/deactive.gif">
                                </a>
                              @else
                                <a href="javascript:void()">
                                  <img src="http://event.titans.mu/event/image/active.gif">
                                </a>
                              @endif
                          </div>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('admin.product.edit',[$value->id]) }}" class="btn btn-info btn-xs">
                            <i class="fa fa-eye fa-fw"></i><span>Sửa</span>
                        </a>
                        <button class="btn btn-danger btn-xs" id="delete-product" value="{{$value->id}}">Xóa</button>

                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th class="text-center"> ID </th>
                  <th class="text-center">MÃ SẢN PHẨM</th>
                  <th class="text-center"> Tên bài viết (EN) </th>
                  <th class="text-center"> Hình ảnh </th>
                  <th class="text-center"> Trạng Thái</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Bạn có muốn xóa Sản phẩm này không ?</h4>
                </div>
                <div class="modal-footer" id="add-body">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-outline" id="delete-save" data-id="">Xóa</button>


                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>

  <script>
    $("body").on('click','#delete-product',function(){
        var value = $(this).val();
        $('#modal-danger').modal('show');
        $('#delete-save').attr('data-id',value);
    });

    $('#delete-save').on('click',function(){
      var id = $(this).attr('data-id');

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url : '{{ route('delete_product') }}',
          type : 'POST',
          data : {
              id : id,
          },
          success : function(data){
              $("#delete-coloum-"+id).replaceWith();
              $('#modal-danger').modal('hide');

              if(data.success){

                  $('#notify_success').html('<div class=" notify success"><div class="alert alert-success">' + data.success + '</div></div>');
                  setTimeout(function(){location.href='{{ route('admin.product.index') }}';},2000);

              }else{
                  $('#notify_success').html('<div class=" notify error"><div class="alert alert-danger">' + data.error + '</div></div>');
                  setTimeout(function(){location.href='{{ route('admin.product.index') }}';},2000);
              }
          }
      });
    })
  </script>
 
  <!-- /.content-wrapper -
@endsection