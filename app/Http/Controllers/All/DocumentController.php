<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Providers\GoogleDriveServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use League\Flysystem\Config;
use League\Flysystem\Visibility;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Illuminate\Support\Facades\File;
use Masbug\Flysystem\GoogleDriveAdapter;

class DocumentController extends Controller
{

    public function createDocument($dataStorage) {
        Storage::disk("$dataStorage")
        ->put('test.txt', 'Hello Vu');
        dd('created');
    }

    public function uploadImage($dataStorage) {
        $localFilepath = public_path('client/images/product/product1.png');
        $remoteFilepath = 'shopTiki/product1.png';
        $fileData = File::get($localFilepath);
        Storage::disk("$dataStorage")
        ->put('product1.png', $fileData);
    }

    public function listDocument($dataStorage) {
         $files = Storage::disk("$dataStorage")->allFiles('/');

        return response()->json([
            'files' => $files,
        ]);
    }
}
