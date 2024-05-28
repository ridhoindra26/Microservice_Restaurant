@extends('layouts.main')

@section('title'){{ $resto->name }} @endsection

@section('content')

{{-- Path :start --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/restaurants" class="text-danger">Katalog</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $resto->name }}</li>
    </ol>
</nav>
{{-- Path :end --}}

{{-- Header :start --}}
<div class="row mb-2">
    <div class="col-md-5 mb-2">
        {{-- <img src="{{ asset('img/pic1.png') }}" class="d-block w-100 object-fit-cover rounded-2 mb-2" alt="notfound" height="300px">
         --}}
         <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              @foreach ($restoMedia as $media)
              <div class="carousel-item active">
                <img src="{{ $media->photo }}" class="d-block w-100 object-fit-cover rounded-2" alt="..." height="300px">
              </div>   
              @endforeach
              <div class="carousel-item">
                <img src="{{ $resto->logo }}" class="d-block w-100 object-fit-cover rounded-2" alt="..." height="300px">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-dark-subtle rounded-1" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-dark-subtle rounded-1" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class="col-md-7">
        <div class="row mb-3">
            <div class="col-8">
                <h2 class="fw-semibold">{{ $resto->name }}</h2>
                <h5 class="text-secondary mb-3">{{ $resto->category }}</h5>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="bg-danger p-2 fw-semibold text-white rounded-bottom-4">
                    <span class="material-symbols-rounded text-warning">star</span>
                    <div class="">4.5</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <div class=" d-flex" id="description">
                <p class="">{{ $resto->description }}</p>
            </div> --}}
            <div class=" d-flex" id="address">
                <span class="material-symbols-rounded text-secondary">place</span>
                <p class="ms-2">{{ $resto->address }}</p>
            </div>
            <div class=" d-flex" id="open-hours">
                <span class="material-symbols-rounded text-secondary">schedule</span>
                <p class="ms-2">{{ $resto->operational_hours }}
                    <span class="fw-semibold ms-2 @if($resto->operational_status == 'Open') text-danger @else text-secondary @endif">{{ $resto->operational_status }}</span> 
                </p>
            </div>
            <div class=" d-flex" id="call">
                <span class="material-symbols-rounded text-secondary">phone</span>
                <p class="ms-2">{{ $resto->phone }}</p>
            </div>
        </div>
    </div>
</div>
{{-- Header :end --}}

{{-- Body :start --}}
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link text-secondary @if(Route::is('resto-details')) active fw-semibold text-danger @endif" href="/restaurants/{{ $resto->id }}">Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary @if(Route::is('resto-menus')) active fw-semibold text-danger @endif" href="/restaurants/{{ $resto->id }}/menu">Menu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary @if(Route::is('resto-reviews')) active fw-semibold text-danger @endif" href="/restaurants/{{ $resto->id }}/review">Review</a>
    </li>
</ul>

<div class="p-3 border border-top-0 rounded-bottom-2 bg-white">
    @yield('body')
</div>
{{-- Body :end --}}

@endsection