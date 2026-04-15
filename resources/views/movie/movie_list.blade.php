<x-movie-layout>
    <x-slot name="title">
        Quản lý phim
    </x-slot>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                bStateSave: true
            });
        });
    </script>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div style='text-align:center; color:#15c; font-weight:bold; font-size:20px; text-transform: uppercase; margin-bottom: 15px;'>
        Danh sách phim
    </div>
    
    <a href="/movie/create" class='btn btn-sm btn-success mb-2'>Thêm</a>
    
    <table id="id-table" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Ngày phát hành</th>
                <th>Điểm đánh giá</th>
                <th width="120px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td style="text-align: center;">
                    <img src="{{ asset('storage/' . $movie->image) }}" width="60px" alt="Ảnh phim">
                </td>
                
                <td>{{ $movie->movie_name_vn }}</td>
                
                <td>
                    <div style="max-height: 80px; overflow: hidden; text-overflow: ellipsis;">
                        {{ $movie->overview_vn }}
                    </div>
                </td>
                
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->vote_average }}</td>
                
                <td>
                    <div class="btn-group">
                        <a href="{{ url('/movie/' . $movie->id) }}" class='btn btn-sm btn-primary'>Xem</a>
                        &nbsp;
                        
                        <form method='get' action = "{{ route('movie.delete', ['id' => $movie->id]) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bộ phim này không?');">
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-movie-layout>