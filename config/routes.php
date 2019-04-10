<?php
return [
    // Редактор новостей:

    'news/edit/create' => 'news/create',
    'news/edit/update/([0-9]+)' => 'news/update/$1',
    'news/edit/delete/([0-9]+)' => 'news/delete/$1',
    'news/tag' => 'news/tag',
    'news/edit' => 'news/edit',

    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    // Новости:
    'news/([a-z]+)' => 'news/tags/$1',
	'news' => 'news/index',


    // Пользователь
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet' => 'cabinet/index',

    // Панель управления:
    'edit' => 'edit/index',
];