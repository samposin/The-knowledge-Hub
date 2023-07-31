@extends('admin.layout')
@section('content')
<!-- Select2 -->
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2/css/select2.min.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
  <!-- summernote -->
  <link rel="stylesheet" href="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.css') !!}">

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
                <li class="breadcrumb-item active">Details</li>
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
                  Product Details
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                @include('admin.theme.notification')
                <table id="example2" class="table table-bordered table-hover">
                  
                  <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                  </tr>
                  <tr>
                    <th>Thumbnail</th>
                    <td><img src="{{ asset('/public/images/products/' . $product->thumbnail) }}" width="100px"></td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>{!! $product->description !!}</td>
                  </tr>
                  </tbody>
                </table>
                <div class="row pt-3">
                    @foreach ($product->product_details()->get() as $pd)
                        @switch($pd->position)
                            @case('bottom')
                                <div class="col-sm-12">{!! $pd->description !!}</div>
                                <div class="col-sm-12">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('/public/images/products/' . $pd->thumbnail) }}" alt="Image" />
                                </div>
                                @break
                            @case('left')
                                <div class="col-sm-6">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('/public/images/products/' . $pd->thumbnail) }}" alt="Image" />
                                </div>
                                <div class="col-sm-6">{!! $pd->description !!}</div>
                                @break
                            @case('right')
                                <div class="col-sm-6">{!! $pd->description !!}</div>
                                <div class="col-sm-6">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('/public/images/products/' . $pd->thumbnail) }}" alt="Image" />
                                </div>
                            @break
                            @default
                                <div class="col-sm-12">
                                  <img class="img-fluid img-thumbnail" src="{{ asset('/public/images/products/' . $pd->thumbnail) }}" alt="Image" />
                                </div>
                                <div class="col-sm-12">{!! $pd->description !!}</div>
                        @endswitch
                        <div class="col-sm-12">
                          <form action="{{ route('admin.products.delete_details', ['detailProduct' => $pd->id]) }}" method="POST">
                            {{-- @can('pd-edit') --}}
                            <a class="btn btn-primary rounded-circle btn-sm"  href="javascript:void(0)" onclick="editProductDetails(({{json_encode($pd)}}))"><i class="fas fa-edit"></i></a>
                            {{-- @endcan --}}
                            @csrf
                            @method('DELETE')
                            {{-- @can('product-delete') --}}
                              <button type="submit" class="btn btn-danger show_confirm rounded-circle btn-sm"><i class="fas fa-trash-alt"></i></button>
                            {{-- @endcan --}}
                          </form>
                        </div>
                    @endforeach
                </div>
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
                    <label for="position">Position</label>
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
                    <img id="previewImg" class="img-fluid" src="" alt="Image" />
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

@endsection


@push('script')

<!-- Select2 -->
<script src="{!! asset('public/admin-theme/plugins/select2/js/select2.full.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<!-- Summernote -->
<script src="{!! asset('public/admin-theme/plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- bs-custom-file-input -->
<script src="{!! asset('public/admin-theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js') !!}"></script>
<script>
  var ImgUrl = "{{ asset('/public/images/products/') }}";
  function editProductDetails(product) {
    console.log(ImgUrl)
      $('#previewImg').attr('src', ImgUrl + '/' + product.thumbnail);
      $("#product_id").val(product.id);
      $("#modal-header").html(product.name);
      $("#description").val(product.description);
      $("#position").val(product.position);
      // $("#modal-table-body").html(dataToAppend);
      $('#myModal').modal('show');
  }
    $(function () {
      $('#description').summernote({ height: 150 });
      //Initialize Select2 Elements
      $('.select2').select2()
      bsCustomFileInput.init();
    })
</script>
@endpush