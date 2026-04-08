<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController002 extends Controller
{
    public function detail($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();
        $genre = DB::table('genre')->get();
        $title = "Chi tiết phim: " . $movie->movie_name_vn;
        return view('movie.detail', compact('movie', 'genre', 'title'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $movies = DB::select("select * from movie where movie_name_vn like ?", ["%".$keyword."%"]);    
        $genre = DB::table('genre')->get();
        $title = "Kết quả tìm kiếm cho: " . $keyword;
        return view("movie.index", compact('movies', 'genre', 'title'));
    }
}
