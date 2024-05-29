@extends('restaurant.layouts.show')

@section('body')

<div class="container mt-5">
    {{-- @isset($message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endisset --}}

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Daftar Menu</h2>
    <!-- Menu Item 1 -->
    @foreach ($menus as $menu)
    <div class="row mb-4">
        <div class="col-md-4">
            <img src="https://via.placeholder.com/300" class="img-fluid" alt="Menu 1">
        </div>
        <div class="col-md-8">
            {{-- @dd($menus) --}} 
            <h5>{{ $menu->nama_menu }}</h5>
            <h6 class="text-danger">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</h6>
            <p>{{ $menu->deskripsi }}</p>
            <form id="addToFavoritesForm" action="{{ url("/store-favorite/$menu->id_menu") }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('addToFavoritesForm').submit();">Tambahkan Favorit</a>
            <a href="#" data-item="{{$menu}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#menuModal{{$menu->id}}">Lihat Detail</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="menuModal{{$menu->id}}" tabindex="-1" aria-labelledby="menuModal{{$menu->id}}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModal{{$menu->id}}Label">Detail Menu: {{ $menu->nama_menu }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/300" class="img-fluid mb-3" alt="Menu Image">
                    <p><strong>Harga:</strong> Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi:</strong> {{ $menu->deskripsi }}</p>
                    <p><strong>Bahan:</strong> {{ $menu->bahan }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


    
@endsection

