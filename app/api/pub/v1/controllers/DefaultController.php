<?php

namespace app\api\pub\v1\controllers;

use Yii;
use yii\rest\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return "API works!";
    }
}
