<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;

class ImageHelper
{
    /**
     * Save the customer image and return its storage path.
     *
     * @param UploadedFile $image
     * @param int $customerId
     * @param string $username
     * @param int $userId
     * @param string $customerName
     * @param string $label
     * @return string
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
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $storagePath = $directory . $fileName;

            // Use configured image driver (from config/image.php)
            $manager = new ImageManager(config('image.driver'));
            $image = $manager->read($image);

           $image = $image->scaleDown(width: 2000, height: 2000);
            // Read and encode image
            $image = $manager->read($image);
            $encoded = $image->toWebp(60);
            $encoded->save($storagePath);

            return "storage/{$fullPath}";
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
