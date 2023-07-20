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
              <h1>Permissions</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Permission</li>
                <li class="breadcrumb-item active">Edit</li>
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
                  Permission Edit
                </h3>
              </div>
              <!-- form start -->
              <form action="{{ route('admin.permissions.update', $permission->id) }}"  id="quickForm" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                @csrf
                <div class="card-body pad">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Role's Name" value="{{ $permission->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <select class="select2" id="guard_name" name="guard_name" data-placeholder="Select Guard Name" style="width: 100%;">
                            <option value="web" {{ ( $permission->guard_name == 'web' ) ? 'selected' : ''}}>Web</option>
                        </select>
                        @error('guard_name')
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
    $('#quickForm').validate({
      rules: {
        name: {
          required: true,
          minlength: 5
        },
        description: {
          required: true,
          minlength: 5
        },
        status: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter the product name",
          email: "product name must be at least 5 characters long."
        },
        description: {
          required: "Please provide a some description about product."
        },
        thumbnail : {
          required: "Please upload product thumbnail."
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endpush