@extends('restaurant.layouts.show')

@section('body')

<div class="row">
    <div class="col-7">
        <div class="fw-semibold">{{ $resto->name }}</div>
        <div class="mb-3">{{ $resto->description }}</div>
        <div class="mb-3">Buka sejak : {{ (\Carbon\Carbon::parse($resto->first_operational_date))->format('j F, Y') }}</div>
        <div class="d-flex mb-2"><span class="material-symbols-rounded me-2">chair</span>{{ $resto->capacity }} orang</div>
        <div class="contact mb-2">
            <div class="d-flex mb-2"><span class="material-symbols-rounded me-2">globe</span>{{ $resto->website }}</div>
            <div class="d-flex"><span class="material-symbols-rounded me-2">mail</span>{{ $resto->email }}</div>
        </div>
        <div class="map mb-2">
            <div class="mb-2 d-flex"><span class="material-symbols-rounded me-2">place</span>{{ $resto->address }}</div>
            <a href="https://www.google.com/maps/search/{{ $resto->address }}" target="_blank">
                <img src="https://cdn.rohde-schwarz.com/pws/_tech/images/map-placeholder.png" alt="" class="w-100 rounded-3 object-fit-cover border" height="150px">
            </a>
        </div>
    </div>
    <div class="col-5"></div>
</div>
    
@endsection