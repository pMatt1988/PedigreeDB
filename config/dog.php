<?php

return [
    'image-directory' => 'pedigree-img',
    'thumbnail-directory' => 'pedigree-img/thumbnails',


    'image-max-width' => 800,
    'image-max-height' => 800,
    'image-thumbnail-width' => 75,

    'form-fields' => [
        'name' => ['text'],
        'sire' => ['text'],
        'dam' => ['text'],
        'sex' => ['select', ['male', 'female']],
        'breeder' => ['text'],
        'owner' => ['text'],
        'dob' => ['text']

    ],

];
