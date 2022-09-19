<?php

namespace app\modules\api\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\filters\VerbFilter;
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
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['logout'],
                    'rules' => [
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'cors' => Cors::class,
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'logout' => ['delete'],
                        'register' => ['post'],
                        'login' => ['post']
                    ],
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(): array
    {
        return ['action' => __METHOD__];
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

    /**
     * Logout action.
     *
     * @return bool
     */
    public function actionLogout(): bool
    {
        return Yii::$app->user->logout();
    }
}
