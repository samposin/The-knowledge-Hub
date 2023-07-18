@extends('frontend.layout')
@section('content')
    <section class="page-title section pb-0">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                <h1 class="text-capitalize mb-0 text-lg">{{ $product->name }}</h1>
                </div>
            </div>
            </div>
        </div>
    </section>
  
  
    <section class="section portfolio-single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div>
                        {!! $product->description !!}
                    </div>

                    {{-- <div class="mt-5">
                        <a href="portfolio-single2.html" class="btn btn-dark">Previous Work</a>
                        <a href="portfolio-single4.html" class="btn btn-dark">Next Work</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection