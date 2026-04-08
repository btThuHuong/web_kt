<x-movie-layout>
    <x-slot name="title">Trang Chủ Movie</x-slot>

    <div class="list-movie">
        @foreach($movies as $item)
            <div class="movie">
                
                <a href="{{ url('/movie/' . $item->id) }}" style="text-decoration: none; color: inherit;">
                   
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->movie_name_vn }}" style="width: 100%;">
                    
                    <div class="movie-info">
                        <h3>{{ $item->movie_name_vn }}</h3>
                        <p>{{ $item->release_date }}</p>
                    </div>
                    
                </a>
                </div>
        @endforeach
    </div>
</x-movie-layout>