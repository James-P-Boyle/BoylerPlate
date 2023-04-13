<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;

class CloudinaryUploader
{
    public function upload($image)
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        $result = $cloudinary->uploadApi()->upload($image->getRealPath());

        return $cloudinary->image($result['public_id'])
            ->resize(Resize::fill(900, 440))
            ->toUrl();
    }
}