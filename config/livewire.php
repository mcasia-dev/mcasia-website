<?php

return [
    'temporary_file_upload' => [
        'rules' => ['required', 'file', 'mimes:mp4,mov,avi,webm', 'max:102400'],
        'max_upload_time' => 10,
    ],
];
