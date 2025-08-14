<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var User $model */

/** @var string $header */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\User\User;

?>

<div class="page-top-panel">
    <div class="page-top-panel-header d-inline">
        <?= $header ?>
    </div>
</div>

<div class="page-content">
    <div class="page-content-form">

        <?php $form = ActiveForm::begin([
            'id' => 'registration-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-form-label pt-0'],
                'inputOptions' => ['class' => 'form-control form-control-sm'],
                'errorOptions' => ['class' => 'invalid-feedback'],
                'enableClientValidation' => false,
            ],
        ]); ?>

        <!-- Имя пользователя -->
        <div class="row form-row">
            <div class="form-col col-4">
                <?= $form->field($model, 'name')->textInput([
                    'maxlength' => true,
                ])->label('Имя') ?>
            </div>
        </div>

        <!-- E-mail -->
        <div class="row form-row">
            <div class="form-col col-4">
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                ]) ?>
            </div>
        </div>

        <!-- Пароль -->
        <div class="row form-row">
            <div class="form-col col-4">
                <?= $form->field($model, 'password')->textInput([
                    'maxlength' => true,
                    'type' => 'password',
                ]) ?>
            </div>
        </div>

        <!-- Подтверждение пароля -->
        <div class="row form-last-row">
            <div class="form-col col-4">
                <?= $form->field($model, 'password_submit')->textInput([
                    'maxlength' => true,
                    'type' => 'password',
                ]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-light btn-outline-primary btn-sm me-2']) ?>
            <?= Html::a('Отмена', '/', ['class' => 'btn btn-light btn-outline-secondary btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
