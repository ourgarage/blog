<?php

return [

    'blog' => [

        'name' => 'blog',

        'menu' => [
            'url' => 'blog::admin::index',
            'caption' => 'Blog',
            'icon' => 'fa fa-book',
            'active' => 'blog::admin::index',
        ],

        'menu-settings' => [
            'url' => 'blog::admin::settings',
            'caption' => 'Blog settings',
            'icon' => 'fa fa-cog',
            'active' => 'blog::admin::settings',
        ],

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Blog package',
        ],
    ],
];
