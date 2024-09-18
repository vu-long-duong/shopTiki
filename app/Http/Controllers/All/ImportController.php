<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Imports\CityDistrictWardImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function importAddress()
    {
        // Đọc file từ storage
        $path = storage_path('app/cities_districts_wards__19_07_2024.xls');
        
        // Thực hiện import dữ liệu
        Excel::import(new CityDistrictWardImport, $path);

        return redirect()->back()->with('success', 'Đã tạo các địa điểm thành công');
    }
}
