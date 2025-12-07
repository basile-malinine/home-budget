<?php

namespace app\controllers;

use yii\db\IntegrityException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

abstract class BaseController extends Controller
{
    abstract protected function getModel();
    abstract protected function getSearchModel();

    public function actionIndex()
    {
        $searchModel = $this->getSearchModel();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('list', compact('dataProvider'));
    }

    public function actionCreate()
    {
        $model = $this->getModel();

        if ($this->request->isPost) {
            if ($this->postRequestAnalysis($model)) {
                $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', compact('model'));
    }

    public function actionEdit($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($this->postRequestAnalysis($model)) {
                $this->redirect(['index']);
            }
        }

        return $this->render('edit', compact('model'));
    }

    public function actionDelete($id): Response
    {
        $this->deleteById($id);

        return $this->redirect(['index']);
    }

    protected function deleteById($id): bool
    {
        $model = $this->findModel($id);

        $dbMessages = \Yii::$app->params['messages']['db'];
        try {
            $model->delete();
            return true;
        } catch (IntegrityException $e) {
            if (!$this->request->isAjax) {
                \Yii::$app->session->setFlash('error', $dbMessages['delIntegrityError']);
            }
            return false;
        } catch (\Exception $e) {
            if (!$this->request->isAjax) {
                \Yii::$app->session->setFlash('error', $dbMessages['delError']);
            }
            return false;
        }
    }

    // Обработка POST-запроса
    protected function postRequestAnalysis($model): bool
    {
        if ($model->load($this->request->post())) {
            if ($model->validate()) {
                if ($model->save()) {
                    return true;
                }
            }
        }
        return false;
    }

    protected function findModel($id)
    {
        if (($model = $this->getModel()::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
