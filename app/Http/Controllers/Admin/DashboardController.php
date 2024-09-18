<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function getHeaderTable($table) {
        $headers = $this->headerColumns($table);
        return $this->responseBase('success', 200, $headers, 'Tải thành công tiêu đề');
    }
}
