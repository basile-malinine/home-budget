<?php

use yii\web\View;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use app\models\User\UserSearch;

/**
 * @var $this View
 * @var $searchModel UserSearch
 * @var $dataProvider ActiveDataProvider
 * @var $header string
 */

//$this->registerJs('let controllerName = "user";', View::POS_HEAD);
//$this->registerJsFile('@web/js/contextmenu-list.js');
?>

<div class="page-content">
    <div class="page-top-panel">
        <div class="page-top-panel-header d-flex">
            <?= $header ?>
<!--            <a href="/user/create" class="btn btn-light btn-outline-secondary btn-sm mt-1 ms-auto pe-3">-->
<!--                <i class="fa fa-plus"></i>-->
<!--                <span class="ms-2">Добавить</span>-->
<!--            </a>-->
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,

//        'rowOptions' => function ($model, $key, $index, $grid) {
//            return [
//                'class' => 'contextMenuRow',
//                'data-row-id' => $model->id,
//            ];
//        },

        'columns' => [
            // #
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [
                    'style' => 'width: 40px;'
                ],
                'contentOptions' => [
                    'style' => 'text-align: right;',
                ]
            ],

            // Имя
            [
                'attribute' => 'name',
                'enableSorting' => false,
                'headerOptions' => [
                    'style' => 'width: 200px;'
                ],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                ],
            ],

            // Электронная почта
            [
                'attribute' => 'email',
                'enableSorting' => false,
                'headerOptions' => [
                    'style' => 'width: 260px;'
                ],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                ],
            ],

            // Статус
            [
                'attribute' => 'active',
                'value' => fn($model) => app\models\User\User::ACTIVE[$model->active],
                'enableSorting' => false,
                'headerOptions' => [
                    'style' => 'width: 80px;'
                ],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                ],
            ],

            // Пустота
            [],
        ],
    ]); ?>

</div>
