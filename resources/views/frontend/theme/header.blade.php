 <!-- Navigation Start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg  main-nav " id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.html">
	  	<img src="{!! asset('public/images/website-log-resized.png') !!}" alt="" class="img-fluid">
	  </a>

	  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-align-justify"></span>
	  </button>
  
		<div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item {{(Route::currentRouteName() === 'home' || Route::currentRouteName() === '') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
				<li class="nav-item {{(Route::currentRouteName() === 'about-us') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Practices</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						@foreach (\App\Models\Admin\Category::all() as $category)
							<li><a class="dropdown-item" href="{{ route('category.products', ['slug'=> $category->slug])}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="nav-item {{(Route::currentRouteName() === 'lets-talk') ? 'active' : '' }}"><a class="nav-link" href="{{ route('lets-talk') }}">Let's Talk</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- Header Close --> 
<!-- Navigation ENd -->