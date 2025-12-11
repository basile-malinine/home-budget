<?php

namespace app\controllers;

use app\models\Unit\Unit;
use app\models\Unit\UnitSearch;

class UnitController extends BaseController
{
    protected function getModel()
    {
        return new Unit();
    }

    protected function getSearchModel()
    {
        return new UnitSearch();
    }

    protected function getTwoId()
    {
    }
}