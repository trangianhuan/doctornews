<?php
return [
    'paths' => [
        'service_image' => 'uploads/service',
    ],
    'validate' => [
        'service_image' => [
            'mimes' => 'jpeg,png,jpg',
            'max_size' => 10240,
        ],
    ],
    'accept_extension' => '.jpeg,.png,.jpg',
    'default' => [
        'post_photo' => '',
    ],
    'dimensions' => [
        'service_image' => [
            'original' => '',
            'larger' => [100, 100],
            'normal' => [100, 100],
            'small' => [32, 32],
        ],
    ],
    'not_resize' => [
    ],
];