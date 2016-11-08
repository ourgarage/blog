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

        'submenu' => [

            [
                'url' => 'blog::admin::categories::index',
                'caption' => 'Categories',
                'icon' => 'fa fa-list',
                'active' => 'blog::admin::categories::index'
            ],

            [
                'url' => 'blog::admin::posts::index',
                'caption' => 'Posts',
                'icon' => 'fa fa-list',
                'active' => 'blog::admin::posts::index'
            ]

        ],

        'menu-settings' => [
            'url' => 'blog::admin::get-settings',
            'caption' => 'Blog settings',
            'icon' => 'fa fa-cog',
            'active' => 'blog::admin::get-settings',
        ],

        'default-settings' => [
            'meta-keywords' => 'Engin CMS, Laravel',
            'meta-description' => 'This package for Engin CMS',
            'meta-title' => 'Blog package',
        ],
    ],
];
