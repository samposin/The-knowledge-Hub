@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Projects</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Project</li>
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
              {{-- <div class="card-header">
                <h3 class="card-title">
                  Product Details
                </h3>
              </div> --}}
              <div class="card-body pad table-responsive">
                  
                  <div class="d-flex justify-content-between">
                    <div class="p-2">
                      <h4>{{ $product->name }}</h4>
                      <p>Dated: {{ date('d-M-Y', strtotime($product->created_at)); }}</p>
                    </div>
                    <div class="p-2"><img id="previewImg" class="img-responsive" src="{{ asset('/public/images/products/' . $product->thumbnail) }}" alt="Image" style="max-width: 120px" />
                    </div>
                  </div>
                  <div class="p-3">
                    {!! $product->description !!}
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
@endsection