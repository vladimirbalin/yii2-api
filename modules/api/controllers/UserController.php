<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\filters\Cors;

class UserController extends ActiveController
{
    public $modelClass = 'app\resources\UserResource';

    public function behaviors()
    {
        return array_merge(parent::behaviors(),
            [
                'corsFilter' => [
                    'class' => Cors::class,
                ],
                'authenticator' => [
                    'class' => HttpBearerAuth::class,
                    'except' => ['options']
                ],
            ]
        );
    }
}