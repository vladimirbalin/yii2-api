<?php

namespace app\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\Cors;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\filters\auth\HttpBearerAuth;
use app\models\User;
use app\modules\api\models\LoginForm;
use app\modules\api\models\RegisterForm;

class AuthController extends Controller
{
    public $enableCsrfValidation = false;

    private static function allowedDomains()
    {
        return [
//             '*',                        // star allows all domains
            'http://127.0.0.1:5173',
//            'http://test2.example.com',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return array_merge($behaviors,
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
                'corsFilter' => [
                    'class' => Cors::class,
                    'cors' => [
                        'Origin' => static::allowedDomains(),
                        'Access-Control-Request-Method' => ['POST'],
                        'Access-Control-Allow-Credentials' => true,
                        'Access-Control-Allow-Headers' => ['*']
                    ],
                ],
//                'authenticator' => [
//                    'class' => HttpBearerAuth::class,
//                    'except' => ['options']
//                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'logout' => ['delete'],
                        'register' => ['post'],
                        'login' => ['post', 'options']
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
}
