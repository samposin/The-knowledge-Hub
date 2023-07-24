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
              <h1>Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Users</li>
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
                  User Edit
                </h3>
              </div>
              <!-- form start -->
              <form action="{{ route('admin.users.update', $user->id) }}"  id="quickForm" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                @csrf
                <div class="card-body pad">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" name="name" class="form-control" id="userName" placeholder="Enter User's Name" value="{{ $user->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter User's Email"  value="{{ $user->email }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="roles">Roles</label>
                        <select class="select2" id="roles" name="roles[]" data-placeholder="Select User's Role" style="width: 100%;">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        @push('script')
                          <script>
                              $('#roles').val(@json($userRoles));
                          </script>
                        @endpush
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="select2" id="status" name="status" data-placeholder="Select Status" style="width: 100%;">
                            <option value="active" {{ ( $user->status == 'active' ) ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{ ( $user->status == 'inactive' ) ? 'selected' : ''}}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col-sm-12">
                      <h4 class="text-info">Projects</h4>
                    </div>
                    {{-- below hiddend feild will aviod error while updating user with no project  --}}
                    <input type="hidden" name="projects" value="">
                    @foreach($projects as $project)
                      <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                          <input type="checkbox" class="form-check-input" id="{{ $project->id }}" name="projects[]" value="{{ $project->id }}" {{ in_array($project->id, $userProjects) ? 'checked' : '' }}>
                          <label class="form-check-label" for="{{ $project->id }}">{{ $project->name }}</label>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="customFile">Profile Picture
                          {{-- <small class="text-info">(370 X 360)</small> --}}
                        </label>
                        <div class="custom-file">
                          <input type="file" name="thumbnail" class="custom-file-input" id="customFile" onchange="readURL(this);">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                          @error('thumbnail')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 text-center">
                      @if( $user->thumbnail )
                        <img id="previewImg" class="img-responsive" src="{{ asset('/public/images/users/' . $user->thumbnail) }}" alt="Image" />
                      @endif
                      <input type="hidden" name="old_thumbnail" value="{{$user->thumbnail}}">
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