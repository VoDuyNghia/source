@extends("templates.admin.master")
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh Mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li class="active">Danh Mục</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh Sách Mục Lục</h3>
            </div>
  

            @if (Session::has('msg'))
            <div id="notify_success" class=" notify success">
                <div class="alert alert-success">{{ Session::get('msg') }}</div>
            </div>
            @endif

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên Danh Mục</th>
                  <th>Vị Trí</th>
                  <th>Chức Năng</th>
                  <th>
                      <a href="{{ route('admin.cat.add') }}" class="btn btn-primary btn-xs">Thêm</a>
        				  </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
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
    <!-- /.content -->
  </div>
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
      })
    })

    setTimeout(function() {
      $('#notify_success').remove();
    }, 5000);
  </script>

 
  <!-- /.content-wrapper -
@endsection