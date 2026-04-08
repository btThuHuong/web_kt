<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index($id = null) {
        // Hiển thị 12 bộ phim theo yêu cầu
        $query = DB::table('movie');

        if ($id) {
            //trang thể loại
            $query->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
                ->where('movie_genre.id_genre', $id)
                ->select('movie.*')
                ->distinct();

            $genreName = DB::table('genre')->where('id', $id)->value('genre_name_vn');
            $title = "Thể loại: " . $genreName;
        }
        else {
            // trang chủ
            $query->where('popularity', '>', 450)
                ->where('vote_average', '>', 7);
            $title = "Trang chủ Movie";
        }

        // Chung: Sắp xếp giảm dần, lấy 12 phim
        $movies = $query->orderBy('release_date', 'desc')
                        ->limit(12)
                        ->get();

        $genre = DB::table('genre')->get();

        return view('movie.index', compact('movies', 'genre', 'title'));
    }
}
