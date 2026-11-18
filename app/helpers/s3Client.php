<?php

use Aws\S3\S3Client;

if (!function_exists("upload")) {
  function upload(mixed $file) {

    $s3Client = new S3Client([
      "version" => "latest",
      "endpoint" => env('AWS_ENDPOINT'),
      "region" => env('AWS_DEFAULT_REGION'),
      "credentials" => [
        "key"    => env('AWS_ACCESS_KEY_ID'),
        "secret" => "nsk_live_c3f71cd4ba2cc12bf71f954867154efaa3e0cee3f4aa991b08618b9f433f99b4",
      ],
      "use_path_style_endpoint" => true
    ]);

    $result = $s3Client->putObject([
      "Bucket"     => env('AWS_BUCKET'),
      "Key"        => $file->getClientOriginalName(),
      "SourceFile" => $file->getRealPath(),
    ]);

    return $result;
  }
}