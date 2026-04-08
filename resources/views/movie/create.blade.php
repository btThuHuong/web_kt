<x-movie-layout>
    <x-slot name="title">Thêm Phim</x-slot>

    <div style="padding: 10px 30px;">
        <h5 style="text-align: center; color: #0056b3; font-weight: bold; margin-bottom: 20px;">THÊM PHIM</h5>

        @if(session('success'))
            <div class="alert alert-success" style="color: green; font-weight: bold; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/movie/store') }}" method="POST" enctype="multipart/form-data">
            @csrf <div class="form-group" style="margin-bottom: 15px;">
                <label>Tên tiếng Anh</label>
                <input type="text" name="original_name" class="form-control" value="{{ old('original_name') }}">
                @error('original_name') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
                @error('movie_name_vn') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Ngày phát hành</label>
                <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
                @error('release_date') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Mô tả</label>
                <textarea name="overview_vn" class="form-control" rows="3">{{ old('overview_vn') }}</textarea>
                @error('overview_vn') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Ảnh đại diện</label><br>
                <input type="file" name="image" style="width: 100%; padding: 5px; border: 1px solid #ced4da; border-radius: 4px;">
                @error('image') <span style="color: red; font-size: 14px;">{{ $message }}</span> @enderror
            </div>

            <div style="text-align: center; margin-top: 25px;">
                <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; padding: 6px 30px;">Lưu</button>
            </div>
        </form>
    </div>
</x-movie-layout>