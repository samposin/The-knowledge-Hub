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
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        {!! $product->description !!}
                    </div>

                    {{-- <div class="mt-5">
                        <a href="portfolio-single2.html" class="btn btn-dark">Previous Work</a>
                        <a href="portfolio-single4.html" class="btn btn-dark">Next Work</a>
                    </div> --}}

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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection