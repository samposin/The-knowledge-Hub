@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
  <style>
    .width-90 {
      width:90px;
    }
    .width-70 {
      width:70px;
    }
    .width-35 {
      width: 35px;
    }
  </style>
@endpush

@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Activity Log</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Activity Log</li>
                <li class="breadcrumb-item active">Listing</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title pt-1">
                  Activity Log list
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                @include('admin.theme.notification')
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="width-35">#</th>
                    <th>Table</th>
                    <th>Event</th>
                    <th>Description</th>
                    <th class="text-center width-90">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($activities as $activity)
                      <tr>
                        <td>@php echo $counter++ @endphp</td>
                        <td>{{ $activity->log_name }}</td>
                        <td>{{ $activity->event }}</td>
                        <td>{{ $activity->description }}</td>
                        <td class="text-center">
                          <a class="btn btn-info rounded-circle btn-sm" href="javascript:void(0)" onclick="showActivityDetails(({{json_encode($activity)}}))"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Table</th>
                      <th>Event</th>
                      <th>Description</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
       
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" id="modal-header">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Label</th>
                      <th>Value</th>
                    </tr>
                  </thead>
                  <tbody id="modal-table-body">
                   
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    <script>
      function showActivityDetails(data) {
          var dataToAppend = '';
          var attri = (data.properties?.attributes) ? data.properties?.attributes : {};
          var old_values = (data.properties?.old) ? data.properties?.old : {};
          // console.log(data.properties.attributes, "properties");
          for (const key in attri) {
              dataToAppend += `<tr><td>${key}</td>
                            <td>${attri[key]}</td></tr>`;
          }
          if(Object.keys(old_values).length){
            dataToAppend += `<tr class="text-center text-info"><td colspan='2'><strong>Old</strong></td></tr>`;
          }
          for (const key1 in old_values) {
              dataToAppend += `<tr><td>${key1}</td>
                            <td>${old_values[key1]}</td></tr>`;
          }
          $("#modal-header").html(data.log_name);
          $("#modal-table-body").html(dataToAppend);
          $('#myModal').modal('show');
      }
    </script>
@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{!! asset('public/admin-theme/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/jszip/jszip.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/pdfmake/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/pdfmake/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('public/admin-theme/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>
    <!-- Page specific script -->
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  
      $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                form.submit();
              }
            });
        });
    
  </script>
    @endpush