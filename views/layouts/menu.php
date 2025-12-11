<?php

use yii\bootstrap5\Nav;
use kartik\bs5dropdown\Dropdown;

echo Nav::widget([
    'dropdownClass' => Dropdown::class,
    'options' => ['class' => 'navbar-nav mr-auto me-auto'],
    'encodeLabels' => false,

    'items' => [
        [
            'options' => ['class' => 'navbar-nav ms-5 me-3'],
            'label' => 'Справочники',
            'items' => [
                [
                    'label' => 'Единицы измерения',
                    'url' => ['/unit'],
                ],

                [
                    'label' => 'Test',
                    'url' => ['/test'],
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

                '<hr class="dropdown-divider">',

                [
                    'label' => 'Объекты системы',
                    'url' => ['/system-object'],
                ],

                [
                    'label' => 'Google',
                    'items' => [
                        [
                            'label' => 'Таблицы Google',
                            'url' => ['/google-sheet'],
                        ],

                        [
                            'label' => 'Связь объектов с Google',
                            'url' => ['/system-object-google-sheet'],
                        ],
                    ],
                ],
            ],
        ],
    ]
]);
