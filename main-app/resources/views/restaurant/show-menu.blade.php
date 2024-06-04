@extends('restaurant.layouts.show')

@section('body')

<div class="container mt-5">
    {{-- @isset($message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endisset --}}

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Daftar Menu</h2>
    <!-- Menu -->
    @if ($menus)
        @foreach ($menus as $menu)
        <div class="row mb-4" id="{{$menu->id_menu}}">
            <div class="col-md-4">
                <img style="height: 200; object-fit: cover" src="{{$menu->foto}}" class="img-fluid" alt="Menu 1">
            </div>
            <div class="col-md-8">
                {{-- @dd($menus) --}} 
                <h5>{{ $menu->nama_menu }}</h5>
                <h6 class="text-danger">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</h6>
                <p>{{ $menu->deskripsi }}</p>
                <form id="addToFavoritesForm{{$menu->id_menu}}" action="{{ url("/store-favorite/$menu->id_menu") }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('addToFavoritesForm{{$menu->id_menu}}').submit();">Tambahkan Favorit</a>
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
                        <img style="height: 200; object-fit: cover" src="{{$menu->foto}}" class="img-fluid" alt="Menu 1">
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
    @else
        <h5>Belum Ada Menu</h5>
    @endif

    
</div>


    
@endsection

