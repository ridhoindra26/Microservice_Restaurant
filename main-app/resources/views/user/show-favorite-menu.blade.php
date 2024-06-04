<div class="list-group">
    @if ($fav_menu)
        @foreach ($fav_menu as $item)
        <div class="row mb-4">
            <div class="col-md-4">
                <img style="height: 200; object-fit: cover" src="{{$item->foto}}" class="img-fluid" alt="Menu 1">
            </div>
            <div class="col-md-8">
                {{-- @dd($item)  --}}
                <h5>{{ $item->nama_menu }}</h5>
                <h6 class="text-danger">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                <p>{{ $item->deskripsi }}</p>
                <form id="deleteToFavoritesForm{{$item->id_menu}}" action="{{ url("/delete-favorite/$item->id_menu") }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteToFavoritesForm{{$item->id_menu}}').submit();">Hapus Favorit</a>
                <a href="{{url("/restaurants/$item->resto_id/menu#$item->id_menu")}}" class="btn btn-primary">Lihat Menu</a>
            </div>
        </div>
        @endforeach
    @else
        <h5>Tidak ada fav menu</h5>
    @endif
    

    
</div>
