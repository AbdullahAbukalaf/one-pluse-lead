<?php

namespace App\Http\Controllers\Admin\Technology;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesTechnologyUploads
{
    protected function storeImage(?UploadedFile $file, string $directory = 'technology'): ?string
    {
        if (!$file) return null;
        return $file->store($directory, ['disk' => config('filesystems.default')]);
    }

    protected function deleteImage(?string $path): void
    {
        if (!$path) return;
        try {
            Storage::disk(config('filesystems.default'))->delete($path);
        } catch (\Throwable $e) {
            // ignore delete failures
        }
    }
}
