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
<div class="row mb-4">
    <div class="col-md-5">
        <img src="../img/pic1.png" class="d-block w-100 object-fit-cover rounded-2 mb-2" alt="notfound" height="300px">
    </div>
    <div class="col-md-7">
        <div class="row mb-3">
            <div class="col">
                <h2 class="fw-semibold">{{ $resto->name }}</h2>
                <h5 class="text-secondary mb-3">{{ $resto->category }}</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <div class="bg-danger p-2 fw-semibold text-white">4.5</div>
            </div>
        </div>
        <div class="card-body">
            <div class=" d-flex" id="description">
                <p class="">{{ $resto->description }}</p>
            </div>
            <div class=" d-flex" id="address">
                <span class="material-symbols-rounded text-secondary">place</span>
                <p class="ms-2">{{ $resto->address }}</p>
            </div>
            <div class=" d-flex" id="open-hours">
                <span class="material-symbols-rounded text-secondary">schedule</span>
                <p class="ms-2">{{ $resto->operational_hours }}</p>
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
        <a class="nav-link text-danger @if(Route::is('resto-details')) active fw-semibold @endif" href="#">Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger @if(Route::is('resto-menus')) active fw-semibold @endif" href="/restaurants/6/menu">Menu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger @if(Route::is('resto-reviews')) active fw-semibold @endif" href="/restaurants/6/review">Review</a>
    </li>
</ul>

<div class="p-3 border border-top-0 rounded-bottom-2">
    @yield('body')
</div>
{{-- Body :end --}}

@endsection