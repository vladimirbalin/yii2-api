<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\Cors;
use app\models\User;
use app\modules\api\models\LoginForm;
use app\modules\api\models\RegisterForm;

class AuthController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(),
            [
                'corsFilter' => [
                    'class' => Cors::class,
                ],
            ]);
    }

    public function actionLogin(): User|array
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        \Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionRegister(): User|array
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->register()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 403;
        return [
            'errors' => $model->errors
        ];
    }
}
