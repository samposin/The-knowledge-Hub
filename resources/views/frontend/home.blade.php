@extends('frontend.layout')
@section('content')
    <!-- Banner Start -->
    <section class="section banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2 class="cd-headline clip is-full-width mb-4 ">
                        We provide <br>
                        <span class="cd-words-wrapper text-color">
                            <b class="is-visible">Design solutions. </b>
                            <b>Creative Ideas.</b>
                            <b>Professional Content.</b>
                        </span>
                    </h2>
                        <p>We are a technology transformation consultancy and software development company that provides cutting edge engineering solutions, helping enterprise clients untangle complex business needs. Since 2009 we have been a visionary and a reliable software engineering partner for world-class brands.</p>
                        <p>We bring together deep industry expertise and the latest IT advancements to deliver custom solutions and products that perfectly fit the needs and behavior of their users. In short, we take care of your complete IT Ecosystem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner End -->

    <!-- POrtfolio start -->
    <section class="portfolio ">
        <div class="container">
            <div class="row mb-5">
                <div class="col-10">
                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                    <label class="btn active ">
                        <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Projects
                    </label>
                        @foreach ($product_categories as $p_c)
                            <label class="btn"><input type="radio" name="shuffle-filter" value="{{ $p_c->slug }}" />{{ $p_c->name }}</label>
                        @endforeach
                    </div>
                </div>
            </div>	

            <div class="row shuffle-wrapper portfolio-gallery">
                @foreach ($products as $product)
                    @php
                        $categories = '';
                        foreach($product->product_categories as $pc){
                            $categories .= '"'.$pc->slug.'", ';
                        }
                        $categories = rtrim($categories, ', ');
                    @endphp
                    <div class="col-lg-4 col-6 mb-4 shuffle-item"  data-groups="[{{$categories}}]">
                        <div class="position-relative inner-box">
                            <div class="image position-relative ">
                            <img src="{!! asset('public/images/products/'.$product->thumbnail) !!}" alt="{{ $product->name }}'s image" class="img-fluid w-100 d-block">
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <a class="overlay-content" href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <h5 class="mb-0">{!! $product->name !!}</h5>
                                        {{-- <p>{!! $product->name !!}</p> --}}
                                        </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio End -->

    <!-- Service start -->
    <section class="section service-home border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mb-2 ">Core Services.</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, totam ipsa quia hic odit a sit laboriosam voluptatem in, blanditiis.</p>
                </div>
            </div>
            
            <div class="row">
                @foreach ($product_categories as $pc)
                    <div class="col-lg-4">
                        <div class="service-item mb-5 mb-lg-0" data-aos="fade-left"  data-aos-delay="750">
                            {{-- <i class="ti-layers"></i> --}}
                            <i class="fas {{$pc->icon}}"></i>
                            <h4 class="my-3">{{ $pc->name }}</h4>
                            {!! $pc->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service end -->    
@endsection