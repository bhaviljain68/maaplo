<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ImageHelper
{
    /**
     * Save the customer image and return its storage path.
     *
     * @param $image
     * @param int $customerId
     * @param string $username
     * @param int $userId
     * @param string $customerName
     * @param string $label
     * @return string  // Return the storage path instead of saving to DB
     */
    public static function imageProccess(UploadedFile $image, $customerId, $username, $userId, $customerName, $label)
    {
        try {
            $timestamp = time();
            $fileName = "{$label}_{$timestamp}.webp";
            $folderPath = "storage/{$username}_{$userId}/{$customerName}_{$customerId}";
            $fullPath = "{$folderPath}/{$fileName}";
            // Define storage path
            $directory = storage_path('app/public/' . $folderPath . '/');
            $storagePath = $directory . $fileName;

            // create new manager instance with desired driver
            $manager = new ImageManager(new Driver());
            // read  image
            $image = $manager->read($image);

            // encod jpeg data
            $encoded = $image->toWebp(60); // Intervention\Image\EncodedImage
            $encoded->save($storagePath);
            return "storage/{$fullPath}";
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
