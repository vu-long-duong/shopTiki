<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use League\Flysystem\UnableToWriteFile;
use Illuminate\Support\Carbon;

trait ImageTraits
{
    /**
     * Upload an image to Google Drive.
     *
     * @param string $localFilePath
     * @param string $remoteFilePath
     * @return bool
     */
    public function uploadImage($localFilePath, $folderName)
    {
        try {

            $disk = Storage::disk('google');

             // Tạo đường dẫn đầy đủ cho file, sử dụng tên file gốc
            if (!$localFilePath instanceof \Illuminate\Http\UploadedFile)
                throw new \Exception('The provided file is not a valid uploaded file.');

            $fileName = pathinfo($localFilePath->getClientOriginalName(), PATHINFO_FILENAME);
            $fullName = $this->generateFolderName($fileName);
            $fullRemotePath = "{$folderName}/{$fullName}";


            // Kiểm tra nếu thư mục chưa tồn tại thì tạo thư mục
            if (!$disk->exists($folderName))
                $this->createFolder($folderName);
                
            $fileData = file_get_contents($localFilePath);
            

            // Upload the image
            if($disk->put($fullRemotePath, $fileData))
                return $fullRemotePath;
            
        } catch (UnableToWriteFile $e) {
            Log::error('Unable to upload image: ' . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            Log::error('An error occurred while uploading image: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete an image from Google Drive.
     *
     * @param string $remoteFilePath
     * @return bool
     */
    public function deleteImage($remoteFilePath)
    {
        try {
            // Get the disk for Google Drive
            $disk = Storage::disk('google');

            // Delete the image
            return $disk->delete($remoteFilePath);
        } catch (\Exception $e) {
            Log::error('An error occurred while deleting image: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Create a folder on Google Drive.
     *
     * @param string $folderPath
     * @return bool
     */
    public function createFolder($folderPath)
    {
        try {
            // Get the disk for Google Drive
            $disk = Storage::disk('google');

            // Create the folder
            return $disk->makeDirectory($folderPath);
        } catch (\Exception $e) {
            Log::error('An error occurred while creating folder: ' . $e->getMessage());
            return false;
        }
    }

    public function generateFolderName($originalName)
    {
        $date = Carbon::now()->format('dmy'); // Lấy ngày tháng năm hiện tại dưới dạng ddmmyy
        $realtime = time(); // Lấy thời gian hiện tại dưới dạng timestamp

        return "{$date}_{$originalName}_{$realtime}";
    }

    /**
     * Lấy ảnh từ Google Drive dựa trên tên file.
     *
     * @param string $fileName
     * @return \Illuminate\Http\Response
     */
    public function getImageFromGoogleDrive($fileName)
    {
        try {
            // Lấy file từ Google Drive
            $file = Storage::disk('google')->get($fileName);
            // List selected root folder contents
            // $dirs = Storage::disk('google')->files('users', true);
            // $url = Storage::disk('google')->url($fileName);
            // dd($url);


            // Trả về file dưới dạng hình ảnh
            return response($file, 200)
                ->header('Content-Type', 'image/jpeg'); // Thay đổi Content-Type nếu cần
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có vấn đề khi lấy ảnh
            return response()->json(['error' => 'File not found or access denied'], 404);
        }
    }
}