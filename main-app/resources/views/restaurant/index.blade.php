@extends('layouts.main')

@section('title')Katalog @endsection

@section('content')

    {{-- Image Carousel :start --}}
    <div id="carouselExampleCaptions" class="carousel slide mb-4">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-3">
            @foreach ($carouselResto as $resto)
            <div class="carousel-item active">
                <img src="img/pic1.png" class="d-block w-100 object-fit-cover" alt="..." height="300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="shadow-lg bg-black bg-opacity-50 px-1">{{ $resto->name }}</h5>
                    <p class="shadow-lg bg-black bg-opacity-50 px-1">{{ $resto->description }}</p>
                </div>
            </div>  
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Image Carousel :end --}}

    <div class="row">

        {{-- Catalog Cards :start --}}
        <div class="col-md-10">
            <div class="row justify-content-evenly m-0 ">
                @forelse ($restaurantData as $resto)
                <div class="card p-0 col-sm-4 m-2 border-0 shadow-sm" style="width: 17rem;">
                    {{-- <img src={{ $resto['logo'] ?? "img/pic3.jpg" }} class="card-img-top object-fit-cover" alt="..." height="200px"> --}}
                    <a href="/restaurants/{{ $resto->id }}">
                        <div class="position-relative">
                            <img src="img/pic3.jpg" class="card-img-top object-fit-cover" alt="..." height="150px">
                            <div class=" bg-warning bg-gradient text-secondary position-absolute top-0 end-0 p-2 rounded-bottom-0 rounded-end-1">
                                4.5
                            </div>
                            <div class="card-body position-absolute bottom-0 px-2 pb-0">
                                <h5 class="card-title text-white shadow-lg bg-black bg-opacity-25 px-1">{{ $resto->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-white fst-italic shadow-lg bg-black bg-opacity-25 px-1">{{ $resto->category }}</h6>
                            </div>
                        </div>
                    </a>
                    <div class="card-desc px-3 py-2">
                        {{-- <p class="card-text">
                            {{ $resto['description'] }}
                        </p> --}}
                        <div class="row">
                            <small class="col d-flex justify-content-start">
                                <span class="material-symbols-rounded fs-5 align-items-center me-1 text-danger">place</span>{{ $resto->address }}
                            </small>
                        </div>
                    </div>
                </div>    
                @empty
                    
                @endforelse
            </div>
        </div>
        {{-- Catalog Cards :end --}}

        {{-- Side Menu :start --}}
        <div class="col-md-2">
            <div class="border border-2 rounded-3 h-100 p-2 px-3 overflow-x-hidden">
                <h3 class="mb-5">Top List</h3>
                <div class="" id="top-3-new">
                    <h6 class="fw-bold">3 New Restaurants</h6>
                    <ul class="ps-3 mb-5">
                        @foreach($carouselResto as $resto)
                        <li class=""><a href="/restaurants/{{ $resto->id }}" class="small text-danger fw-bold">{{ $resto->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="" id="top-rated">
                    <h6 class="fw-bold">Top Rated Restaurants</h6>
                    <ul class="ps-3 mb-5">
                        @foreach($topRatedResto as $resto)
                        <li class=""><a href="/restaurants/{{ $resto->id }}" class="small text-danger fw-bold">{{ $resto->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- Side Menu :end --}}

    </div>

@endsection
