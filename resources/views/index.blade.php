@extends('layouts.master')





@section('content')
@include('layouts.header')

    <section class="bg-light portfolio" id="topGames" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">الأكثر تحميلا</h2>
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                </div>
            </div>
            <div class="row">
                @foreach($topGames as $game)
                    <div class="col-md-4 col-sm-6 portfolio-item top-download">
                        <div class="download-count">{{ $game->downloads }}</div>
                        <a class="portfolio-link" {{ \Illuminate\Support\Facades\Auth::check() ? "data-toggle=modal " : '' }}href="{{ \Illuminate\Support\Facades\Auth::check() ? '#gameModal'.$game->id: route('subscribe') }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ $game->image }}" alt="{{ $game->name }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>{{ $game->name }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


<!-- Games Grid -->
    @foreach($categories as $category)
        @if(count($category->games))
            <section class="bg-light portfolio" id="category{{ $category->id }}" dir="rtl">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading text-uppercase">{{ $category->name }}</h2>
                            <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach($category->games as $game)
                            <div class="col-md-4 col-sm-6 portfolio-item">
                                <a class="portfolio-link" {{ \Illuminate\Support\Facades\Auth::check() ? "data-toggle=modal " : '' }}href="{{ \Illuminate\Support\Facades\Auth::check() ? '#gameModal'.$game->id: route('subscribe')}}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="{{ $game->image }}" alt="{{ $game->name }}">
                                </a>
                                <div class="portfolio-caption">
                                    <h4>{{ $game->name }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach


    <!-- Game Modals -->
    {{ csrf_field() }}
    @foreach($categories as $category)
        @if(count($category->games))
            @foreach($category->games as $game)
                <div class="portfolio-modal modal fade" id="gameModal{{ $game->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal">
                                <div class="lr">
                                    <div class="rl"></div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here -->
                                            <h2 class="text-uppercase">{{ $game->name }}</h2>

                                            <img class="img-fluid d-block mx-auto" src="{{ $game->image }}" alt="{{ $game->name }}">
                                            <p>{{ $game->description }}</p>
                                            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger download" target="blank" href="{{ route('game')}}/{{ $game->id }}">تحميل</a>
                                            <input type="hidden" value="{{$game->id}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach





@endsection





