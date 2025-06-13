<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    public function uploadMany(array $images, string $directory = 'uploads/gallery'): array
    {
        $paths = [];

        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();

            $filename = Str::uuid()->toString() . '.' . $extension;

            $path = $image->storeAs($directory, $filename, 'public');

            $paths[] = ['file' => $path];
        }

        return $paths;
    }

    public function storeSingle($image): string
    {
        $extension = $image->getClientOriginalExtension();

        $filename = Str::uuid()->toString() . '.' . $extension;

        return $image->storeAs('uploads', $filename, 'public');
    }

    public function deleteImages($image)
    {
        Storage::disk('public')->delete($image);
    }
}
