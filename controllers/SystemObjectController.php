<?php

namespace app\controllers;

use app\models\SystemObject\SystemObject;
use app\models\SystemObject\SystemObjectSearch;

class SystemObjectController extends BaseController
{
    protected function getModel()
    {
        return new SystemObject();
    }

    protected function getSearchModel()
    {
        return new SystemObjectSearch();
    }
}