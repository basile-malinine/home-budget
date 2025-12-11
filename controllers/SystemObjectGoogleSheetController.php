<?php

namespace app\controllers;

use app\models\SystemObjectGoogleSheet\SystemObjectGoogleSheet;
use app\models\SystemObjectGoogleSheet\SystemObjectGoogleSheetSearch;

class SystemObjectGoogleSheetController extends BaseController
{
    protected function getModel()
    {
        return new SystemObjectGoogleSheet();
    }

    protected function getSearchModel()
    {
        return new SystemObjectGoogleSheetSearch();
    }

    protected function getTwoId(): array
    {
        return ['system_object_id', 'google_sheet_id'];
    }
}