<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

use app\models\User\LoginForm;
use app\models\User\User;
use app\models\User\UserSearch;

class UserController extends BaseController
{
    protected function getModel()
    {
        return new User();
    }

    protected function getSearchModel()
    {
        return new UserSearch();
    }

    protected function getTwoId()
    {
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}