@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
  <style>
    .width-90 {
      width:90px;
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
              <h1>Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Products</li>
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
                  Products list
                </h3>
                  @can('product-create')
                    <a class="btn btn-success float-right btn-sm" href="{{ route('admin.products.create') }}"> <i class="fas fa-plus"></i> Add New</a>
                  @endcan
              </div>
              <div class="card-body pad table-responsive">
                @include('admin.theme.notification')
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                    <th>Status</th>
                    <th class="text-center width-90">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($products as $product)
                      <tr>
                        <td>@php echo $counter++ @endphp</td>
                        <td>{{ $product->name }}</td>
                        <td>
                          @php
                            $result_names = '';
                            foreach ($product->product_categories as $product_category) {
                              $result_names .= $product_category->name.', ';
                            }
                            $result_names = rtrim($result_names, ', ');
                            if(count($product->product_categories) > 1){
                              $result_names = $result_names. '.';
                            }
                            echo $result_names;
                            @endphp
                        </td>
                        <td><img src="{{ asset('/public/images/products/' . $product->thumbnail) }}" width="100px"></td>
                        <td>{{ $product->status }}</td>
                        <td class="text-center">
                          <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-info rounded-circle btn-sm" href="{{ route('admin.products.show',$product->id) }}"><i class="fas fa-eye"></i></a>
                            @can('product-edit')
                              <a class="btn btn-primary rounded-circle btn-sm" href="{{ route('admin.products.edit',$product->id) }}"><i class="fas fa-edit"></i></a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                              <button type="submit" class="btn btn-danger show_confirm rounded-circle btn-sm"><i class="fas fa-trash-alt"></i></button>
                            @endcan
                        </form>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Thumbnail</th>
                      <th>Status</th>
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