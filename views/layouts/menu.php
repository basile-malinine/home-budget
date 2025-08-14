<?php

use yii\bootstrap5\Nav;

echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-5'],
    'encodeLabels' => false,

    'items' => [
        [
            'options' => ['class' => 'navbar-nav me-3'],
            'label' => 'Справочники',
            'items' => [
                [
                    'label' => 'Единицы измерения',
                    'url' => ['/unit'],
                ],
            ],
        ],

        [
            'label' => 'Управление',
            'items' => [
                [
                    'label' => 'Пользователи',
                    'url' => ['/user'],
                ],
            ]
        ],
    ]
]);
