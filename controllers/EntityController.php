<?php

namespace app\controllers;

use yii\web\Controller;
use yii\db\IntegrityException;

class EntityController extends Controller
{
    public function actionDelete($id)
    {
        $this->deleteById($id);

        return $this->redirect(['index']);
    }

    protected function deleteById($id)
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
}
