<?php
use App\Models\Socialite;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getLocale')) {
    function getLocale($locale)
    {
        return session('locale', config('app.locale')) === $locale;
    }
}


if (!function_exists('get_image')) {

    function get_image($pathImage){

        // dd(trim($pathImage));
        $defaultIamge = 'users/user_default';
        // Kiểm tra nếu $pathImage có giá trị hợp lệ
        if (is_null($pathImage) || trim($pathImage) === '') {
            return Storage::disk('google')->url($defaultIamge);
        }
    
        try {
            // Lấy URL của ảnh từ Google Drive
            $url = Storage::disk('google')->url($pathImage);
        } catch (Exception $e) {
            // Nếu có lỗi, sử dụng ảnh mặc định
            $url = Storage::disk('google')->url($defaultIamge);
        }
    
        return $url;
    }
}

// $defaultIamge = 'users/user_default';
        // // try {
        // //     $url = Storage::disk('google')->url(trim($pathImage));
            
        // // } catch (Exception $e) {
        // //     $url = Storage::disk('google')->url(trim($defaultIamge));
        // // }
        // if($pathImage == null)
        //     $url = Storage::disk('google')->url(trim($defaultIamge)); 
        // else
        //     $url = Storage::disk('google')->url(trim($pathImage));

        // return $url;