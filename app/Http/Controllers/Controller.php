<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function responseBase($status, $code, $data = null, $message = null)
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'data' => $data,
            'message' => $message
        ]);
    }

    protected function headerColumns($table)
    {
        $headers = Schema::getColumnListing($table);
        $translatedHeaders = array();
 
        $values = array_map(function($header) use ($table) {
            return __('header.' . $table . '.' . $header);
        }, $headers);
        
        $translatedHeaders = array_combine($headers, $values);

        return $translatedHeaders;
    }
}
