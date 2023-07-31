@push('style')
<!-- Select2 -->
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2/css/select2.min.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
  <!-- summernote -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.css') !!}">
  <style>
    .width-120 {
      width:120px;
    }
    #previewImg{
    max-width: 180px;
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
                    <th class="text-center width-120">Action</th>
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
                            <a class="btn btn-success rounded-circle btn-sm"  href="javascript:void(0)" onclick="addProductDetails(({{json_encode($product)}}))"><i class="fas fa-plus"></i></a>
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


           
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('admin.products.add_details') }}" id="add_product_details" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" id="product_id" value=""/>
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" id="modal-header">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="position">Image Position</label>
                      <select class="select2" id="position" name="position" data-placeholder="Select position" style="width: 100%;">
                          <option value="top">Top</option>
                          <option value="bottom">Bottom</option>
                          <option value="left">Left</option>
                          <option value="right">Right</option>
                      </select>
                      @error('position')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="customFile">Image</label>
                      <div class="custom-file">
                        <input type="file" name="thumbnail" class="custom-file-input" id="customFile" onchange="readURL(this);">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="text-center">
                      <img id="previewImg" class="d-none img-responsive" src="" alt="Image" />
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="description" name="description" required></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>

    <script>
      function addProductDetails(product) {
        $("#product_id").val(product.id);
          $("#modal-header").html(product.name);
          // $("#modal-table-body").html(dataToAppend);
          $('#myModal').modal('show');
      }
      function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#previewImg').attr('src', e.target.result);
          $('#previewImg').removeClass('d-none');
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
@endsection


@push('script')

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

    <!-- Select2 -->
    <script src="{!! asset('public/admin-theme/plugins/select2/js/select2.full.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <!-- Summernote -->
    <script src="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.js') !!}"></script>
    <!-- bs-custom-file-input -->
    <script src="{!! asset('public/admin-theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js') !!}"></script>
    <script>
  $(function () {
    $('#description').summernote({ height: 150 });
      //Initialize Select2 Elements
      $('.select2').select2()
      bsCustomFileInput.init();

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