<?php

$create = 'create';
$read = 'read';
$update = 'update';
$delete = 'delete';

$users = 'user';
$articles = 'article';
$categories = 'category';
$advertisements = 'advertisement';

$superAdmin = 'super_admin';
$publisher = 'publisher';
$advertisemnetsAdmin = 'advertisemnets_admin';

return [

    'modules' => [$users, $articles, $categories, $advertisements],
    'operations' => [$create, $read, $update, $delete],

    'roles' => [
        $superAdmin => [
            $users => [$create, $read, $update, $delete],
            $articles => [$create, $read, $update, $delete],
            $categories => [$create, $read, $update, $delete],
            $advertisements => [$create, $read, $update, $delete],
        ],
        $publisher => [
            $users => [],
            $articles => [$create, $read, $update, $delete],
            $categories => [$create, $read, $update, $delete],
            $advertisements => [],
        ],
        $advertisemnetsAdmin => [
            $users => [],
            $articles => [],
            $categories => [$read],
            $advertisements => [$create, $read, $update, $delete],
        ],
    ]
];
