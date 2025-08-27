<?php

return [

    'temporary_file_upload' => [
        'disk' => 'local', // или 'local', 's3'
        'rules' => ['file', 'max:512000'],  // 500MB
        'directory' => 'livewire-tmp',
        'middleware' => 'throttle:60,1',
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 10, // минуты
    ],



];
