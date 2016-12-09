<?php

return [

    'index' => [
        'title' => 'Блог',
        'menu' => 'Меню',
        'home' => 'Главная',
    ],

    'button' => [
        'create' => 'Создать',
        'create-category' => 'Создать новую категорию',
        'update' => 'Обновить',
        'save' => 'Сохранить',
    ],

    'settings' => [
        'title' => 'Настройки блога',
    ],

    'category' => [
        'title' => 'Все категории',
        'no-categories' => 'Нет ни одной категории',
        'must-category' => 'Сначала необходимо создать хотя бы одну категорию',
        'add' => 'Новая категория',
        'edit' => 'Правка категории',

        'table' => [
            'uri' => 'URI',
            'title' => 'Название',
            'created' => 'Дата создания',
            'options' => 'Опции'
        ],

        'create' => [
            'meta-keywords' => 'Meta keywords',
            'meta-description' => 'Meta description',
            'meta-title' => 'Meta title',
        ],

        'notifications' => [
            'category-status-update' => 'Статус категории успешно изменен',
            'category-created-success' => 'Новая категория успешно создана',
            'category-delete' => 'Категория была удалена',
            'category-update' => 'Изменения успешно сохранены',
        ],

        'popup' => [
            'title' => 'Редактировать категорию',
            'activate' => 'Вы действительно хотите включить эту категорию?',
            'deactivate' => 'Вы действительно хотите выключить эту категорию?',
            'delete' => 'Вы действительно хотите удалить эту категорию?',
        ],
    ],

    'post' => [
        'title' => 'Все публикации',
        'no-posts' => 'Нет ни одной публикации',
        'add' => 'Новая публикация',
        'edit' => 'Правка публикации',
        'category' => 'Выбрать категорию',
        'date-published' => 'Дата публикации',
        'view-category-posts' => 'Показать все публикации категории',
        'all-posts-in' => 'Все публикации категории ',

        'table' => [
            'uri' => 'URI',
            'title' => 'Название',
            'category' => 'Категория',
            'created' => 'Дата создания',
            'options' => 'Опции'
        ],

        'notifications' => [
            'post-status-update' => 'Статус публикации успешно изменен',
            'post-created-success' => 'Новая публикация успешно создана',
            'post-delete' => 'Публикация была удалена',
            'post-update' => 'Изменения успешно сохранены',
        ],

        'popup' => [
            'title' => 'Редактировать публикацию',
            'activate' => 'Вы действительно хотите включить эту публикацию?',
            'deactivate' => 'Вы действительно хотите выключить эту публикацию?',
            'delete' => 'Вы действительно хотите удалить эту публикацию?',
        ],

        'view' => [
            'posted' => 'Опубликовано'
        ]
    ],

    'tags' => [
        'title' => 'Теги',
        'tag' => 'Публикации по тегу',
        'popular' => 'Популярные теги'
    ],

    'notifications' => [
        'blog-settings-save' => 'Настройки успешно сохранены',
    ],

    'users' => [
        'index' => 'Блог - последние новости',
        'no-news' => 'У вас пока нет новостей'
    ]
];
