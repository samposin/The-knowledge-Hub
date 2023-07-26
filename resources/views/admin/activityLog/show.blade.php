@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Permission</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Permission</li>
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