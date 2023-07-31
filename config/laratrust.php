<?php

return [

    'use_morph_map' => false,

    'checker' => 'default',

    'cache' => [
        'enabled' => env('LARATRUST_ENABLE_CACHE', true),
        'expiration_time' => 3600,
    ],

    'user_models' => [
        'users' => \App\Models\User\User::class,
    ],

    'models' => [
        'role' => App\Models\User\Role::class,
        'permission' => \App\Models\User\Permission::class,
    ],

    'tables' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'role_user' => 'role_user',
        'permission_user' => 'permission_user',
        'permission_role' => 'permission_role',
    ],

    'foreign_keys' => [
        'user' => 'user_id',
        'role' => 'role_id',
        'permission' => 'permission_id',
        'team' => 'team_id',
    ],

    'middleware' => [
        'register' => true,
        'handling' => 'abort',
        'handlers' => [
            'abort' => [
                'code' => 403,
                'message' => 'User does not have any of the necessary access rights.'
            ],

            'redirect' => [
                'url' => '/home',
                'message' => [
                    'key' => 'error',
                    'content' => ''
                ]
            ]
        ]
    ],

    'magic_is_able_to_method_case' => 'kebab_case',

    'permissions_as_gates' => false,
];
