@push('style')
<!-- summernote -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.css') !!}">
  <style>
    #previewImg{
      max-width: 180px;
    }
  </style>
@endpush
<!-- Select2 -->
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2/css/select2.min.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">

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
                <li class="breadcrumb-item active">edit</li>
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
                <h3 class="card-title">
                  {{-- <i class="fas fa-edit"></i> --}}
                  Product Edit
                </h3>
              </div>
              <!-- form start -->
              <form action="{{ route('admin.products.update',$product->id) }}" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                <div class="card-body pad">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" name="name" class="form-control" id="productName" placeholder="Enter Product Name" value="{{ $product->name }}" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="categories">Product Categories</label>
                        <select class="select2" id="categories" name="categories[]" multiple="multiple" data-placeholder="Select a product categories" style="width: 100%;">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  @push('script')
                    <script>
                        $('#categories').val(@json($product->product_categories->pluck('id')));
                    </script>
                  @endpush
                  {{-- $product->product_categories->pluck('id') --}}
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{!!$product->description !!}</textarea>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="customFile">Thumbnail</label>
                        <div class="custom-file">
                          <input type="file" name="thumbnail" class="custom-file-input" id="customFile" onchange="readURL(this);">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                      <div class="text-center">
                        <img id="previewImg" class="img-responsive" src="{{ asset('/public/images/products/' . $product->thumbnail) }}" alt="Image" />
                        <input type="hidden" name="old_thumbnail" value="{{$product->thumbnail}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="select2" id="status" name="status" data-placeholder="Select Status" style="width: 100%;">
                            <option value="active" {{ ( $category->status == 'active' ) ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ ( $category->status == 'inactive' ) ? 'selected' : ''}}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
  <!-- Select2 -->
  <script src="{!! asset('public/admin-theme/plugins/select2/js/select2.full.min.js') !!}"></script>
  <!-- jquery-validation -->
  <script src="{!! asset('public/admin-theme/plugins/jquery-validation/jquery.validate.min.js') !!}"></script>
  <script src="{!! asset('public/admin-theme/plugins/jquery-validation/additional-methods.min.js') !!}"></script>
  <!-- Summernote -->
  <script src="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.js') !!}"></script>
  <!-- bs-custom-file-input -->
  <script src="{!! asset('public/admin-theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js') !!}"></script>
  <script>


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
    $(function () {
      $('#description').summernote({ height: 150 });
      //Initialize Select2 Elements
      $('.select2').select2()
      bsCustomFileInput.init();
    //   $.validator.setDefaults({
    //   submitHandler: function () {
    //     alert( "Form successful submitted!" );
    //   }
    // });
    // $('#quickForm').validate({
    //   rules: {
    //     name: {
    //       required: true,
    //       minlength: 3
    //     },
    //     description: {
    //       required: true,
    //       minlength: 5
    //     },
    //     thumbnail: {
    //       required: true
    //     }
    //   },
    //   messages: {
    //     name: {
    //       required: "Please enter the product name",
    //       email: "product name must be at least 3 characters long."
    //     },
    //     description: {
    //       required: "Please provide a some description about product."
    //     },
    //     thumbnail : {
    //       required: "Please upload product thumbnail."
    //     },
    //   },
    //   errorElement: 'span',
    //   errorPlacement: function (error, element) {
    //     error.addClass('invalid-feedback');
    //     element.closest('.form-group').append(error);
    //   },
    //   highlight: function (element, errorClass, validClass) {
    //     $(element).addClass('is-invalid');
    //   },
    //   unhighlight: function (element, errorClass, validClass) {
    //     $(element).removeClass('is-invalid');
    //   }
    // });
  });
</script>
@endpush