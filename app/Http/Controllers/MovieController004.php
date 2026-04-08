<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController004 extends Controller
{
    public function create()
    {
        $genre = DB::table('genre')->get();
        $title = "Thêm phim mới";
        return view('movie.create', compact('genre', 'title'));
    }

    // 2. Xử lý thêm phim
    public function store(Request $request)
    {
        // KỊCH BẢN BẮT LỖI (Sẽ in ra chữ đỏ tiếng Việt nếu nhập sai)
        $request->validate([
            'original_name' => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d',
            'overview_vn'   => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'original_name.required'   => 'Vui lòng nhập tên tiếng Anh.',
            'movie_name_vn.required'   => 'Vui lòng nhập tên tiếng Việt.',
            'release_date.required'    => 'Vui lòng nhập ngày phát hành.',
            'release_date.date_format' => 'Ngày phát hành phải theo định dạng yyyy-mm-dd.',
            'overview_vn.required'     => 'Vui lòng nhập mô tả.',
            'image.required'           => 'Vui lòng chọn ảnh đại diện.',
            'image.image'              => 'File tải lên không phải là định dạng ảnh.',
            'image.mimes'              => 'Ảnh chỉ chấp nhận đuôi jpeg, png, jpg, gif.',
        ]);

        // Xử lý lưu file ảnh vào thư mục storage/app/public
        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName); 
            $imagePath = '/' . $fileName; // Thêm dấu gạch chéo cho giống định dạng trong DB cũ
        }

        // Tạo ID mới nhất (Phòng trường hợp DB của trường không có auto_increment)
        $maxId = DB::table('movie')->max('id');
        $newId = $maxId ? $maxId + 1 : 1;

        // Lưu vào Database
        DB::table('movie')->insert([
            'id'            => $newId,
            'movie_name'    => $request->original_name, // Cột này bắt buộc phải có trong DB
            'original_name' => $request->original_name,
            'movie_name_vn' => $request->movie_name_vn,
            'release_date'  => $request->release_date,
            'overview_vn'   => $request->overview_vn,
            'image'         => $imagePath,
        ]);

        // Quay lại trang thêm và báo thành công
        return back()->with('success', 'Đã lưu bộ phim thành công!');
    }
}
