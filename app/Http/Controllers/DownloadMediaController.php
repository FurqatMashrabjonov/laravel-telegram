<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DownloadMediaController extends Controller
{
    public function download(string $model, string $file_unique_id, Request $request)
    {
        $model = 'App\\Models\\' . Str::ucfirst(Str::snake($model));

        $media = $model::where('file_unique_id', $file_unique_id)->firstOrFail();

        return response()->download($media->file_path, $media->file_name, [
            'Content-Type' => $media->mime_type,
            'Content-Length' => $media->file_size,
        ]);
    }
}
