<x-movie-layout>
    <x-slot name="title">Chi tiết phim</x-slot>

    <div class="movie-detail" style="padding: 10px 20px;">
        <h3 style="margin-bottom: 10px;">
            {{ $movie->movie_name_vn }}
        </h3>
        
        <div style="display: flex; gap: 30px;">
            
            <div style="flex: 0 0 300px;">
                <img src="{{ asset('storage/' . $movie->image) }}" alt="Poster" style="width: 100%; border-radius: 0px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            </div>
            
            <div style="flex: 1; font-size: 16px; line-height: 1.5;">
                <p style="margin-bottom: 5px;">Ngày phát hành:<b> {{ $movie->release_date }}</b></p>
                <p style="margin-bottom: 5px;">Quốc gia: <b>{{ $movie->country_name }}</b></p>
                <p style="margin-bottom: 5px;">Thời gian: <b>{{ $movie->runtime }} phút</b></p>
                <p style="margin-bottom: 5px;">Doanh thu: <b>{{ $movie->revenue }}</b></p>
                <p style="margin-bottom: 5px;"><b>Mô tả:</b> <br> {{ $movie->overview_vn }}</p>
                
                <a href="#" style="margin-top: 5px; background-color: #28a745; border: none; padding: 8px 20px; color: white; border-radius: 5px; text-decoration: none; display: inline-block;">
                    Xem trailer
                </a>
            </div>
        </div>
    </div>
</x-movie-layout>