<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Model
{
    static function S3($fileData, $folder, $subName)
    {
        $file = $fileData;
        $fileName = $file->getClientOriginalName();
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $s3 = Storage::disk('s3')->getClient();
        $bucket = config('filesystems.disks.s3.bucket');

        $movedName = $subName . '-' . strtotime(date('Y-m-d H:i:s')) . '.' . $extension;

        $path = $folder . '/' . $movedName;
        $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $path,
            'SourceFile' => $file->path(),
            'ACL' => 'public-read',
            'ContentType' => $file->getMimeType(),
            'ContentDisposition' => 'inline; filename="' . $fileName . '"',
        ]);

        return Storage::disk('s3')->url($path);
    }

    static function S3_PDF($localFilePath, $folder, $subName)
    {
        $s3 = Storage::disk('s3')->getClient();
        $bucket = config('filesystems.disks.s3.bucket');

        $movedName = $subName . '-' . strtotime(date('Y-m-d H:i:s')) . '.' . pathinfo($localFilePath, PATHINFO_EXTENSION);

        $path = $folder . '/' . $movedName;

        $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $path,
            'SourceFile' => $localFilePath,
            'ACL' => 'public-read',
            'ContentType' => mime_content_type($localFilePath),
            'ContentDisposition' => 'inline; filename="' . basename($localFilePath) . '"',
        ]);

        return Storage::disk('s3')->url($path);
    }
}
