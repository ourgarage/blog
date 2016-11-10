<?php

return [

    'index' => [
        'title' => 'Blog'
    ],

    'button' => [
        'create' => 'Create',
        'create-category' => 'Create new category',
        'update' => 'Update',
        'save' => 'Save',
    ],

    'settings' => [
        'title' => 'Blog settings',
    ],

    'category' => [
        'title' => 'All Categories',
        'no-categories' => 'You have no categories',
        'must-category' => 'First, you must create at least one category',
        'add' => 'Create category',
        'edit' => 'Edit category',

        'table' => [
            'uri' => 'URI',
            'title' => 'Title',
            'created' => 'Date created',
            'options' => 'Options'
        ],

        'create' => [
            'meta-keywords' => 'Meta keywords',
            'meta-description' => 'Meta description',
            'meta-title' => 'Meta title',
        ],

        'notifications' => [
            'category-status-update' => 'Status of category has been successfully changed',
            'category-created-success' => 'New category has been successfully created',
            'category-delete' => 'Category has been successfully deleted',
            'category-update' => 'Category has been successfully updated',
        ],

        'popup' => [
            'title' => 'Edit category',
            'activate' => 'Do you want to activate this category?',
            'deactivate' => 'Do you want to deactivate this category?',
            'delete' => 'Do you want to delete this category?',
        ],
    ],

    'post' => [
        'title' => 'All posts',
        'no-posts' => 'You have no posts',
        'add' => 'Create post',
        'edit' => 'Edit post',
        'category' => 'Select category',

        'table' => [
            'uri' => 'URI',
            'title' => 'Title',
            'category' => 'Category',
            'created' => 'Date created',
            'options' => 'Options'
        ],

        'notifications' => [
            'post-status-update' => 'Status of post has been successfully changed',
            'post-created-success' => 'New post has been successfully created',
            'post-delete' => 'Post has been successfully deleted',
            'post-update' => 'Post has been successfully updated',
        ],

        'popup' => [
            'title' => 'Edit post',
            'activate' => 'Do you want to activate this post?',
            'deactivate' => 'Do you want to deactivate this post?',
            'delete' => 'Do you want to delete this post?',
        ],
    ],

    'notifications' => [
        'blog-settings-save' => 'Settings has been successfully saved',
    ]

];
