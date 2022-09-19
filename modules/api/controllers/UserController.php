<?php

namespace app\modules\api\controllers;

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
//                    'cors' => [
//                        'Origin' => ['*'],
//                        'Access-Control-Allow-Credentials' => true,
//                    ],
                ]
            ]
        );
    }
}