<!-- Header -->
<header class="masthead">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            
			@foreach($categories as $category)
			@if(count($category->games))
				<div class="carousel-item category{{ $category->id }} {{ $category->id == 1 ? 'active' : '' }}">
					<div class="container">
						<div class="intro-text">
							<div class="intro-lead-in header-title"><h1>{{ $category->name }}</h1></div>
							<div class="intro-heading text-uppercase header-title">{{ $category->description }}</div>
							<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#category{{ $category->id }}">إلعب</a>
						</div>
					</div>
				</div>
			@endif

			@endforeach
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
