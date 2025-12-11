<?php

namespace app\controllers;

use yii\web\Response;

use app\models\GoogleSheet\GoogleSheet;
use app\models\GoogleSheet\GoogleSheetSearch;

class GoogleSheetController extends BaseController
{
    protected function getModel()
    {
        return new GoogleSheet();
    }

    protected function getSearchModel()
    {
        return new GoogleSheetSearch();
    }

    protected function getTwoId()
    {
    }

    public function actionTest()
    {
        $spreadsheetId = $this->request->post('spreadsheetId');
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $data = GoogleSheet::testGoogleSpreadsheet($spreadsheetId);

        return $data;
    }
}
