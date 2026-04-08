<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController3 extends Controller
{
    // Hiển thị danh sách phim
    public function index()
    {
        $movies = DB::table('movie')->where('status', 1)->get();
        return view('movie.movie_list', compact('movies'));
    }

    // Chức năng xóa mềm
    public function destroy($id)
    {
        DB::table('movie')->where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Đã xóa phim thành công!');
    }
}