<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use Faker\Factory;
use yii\console\Controller;
use yii\helpers\Console;

class SeedController extends Controller
{
    public function actionSeedTestUser()
    {
        $faker = Factory::create();
        $user = new User();

        $user->email = $faker->email;
        $user->username = 'test';
        $user->phone = $faker->phoneNumber;
        $user->password_hash = \Yii::$app->security->generatePasswordHash('test');
        $user->access_token = \Yii::$app->security->generateRandomString(1024);

        if($user->save()){
            Console::output('Successfully saved');
        } else {
            var_dump($user->errors);
            Console::output('Not saved');
        };
    }

    public function actionSeedUsers($number = 5)
    {
        $faker = Factory::create();

        for($i = 0; $i < $number; $i++){
            $user = new User();

            $user->email = $faker->email;
            $user->username = $faker->userName;
            $user->phone = $faker->phoneNumber;
            $user->password_hash = \Yii::$app->security->generatePasswordHash('test');
            $user->access_token = \Yii::$app->security->generateRandomString(1024);

            if($user->save()){
                Console::output('Successfully saved');
            } else {
                var_dump($user->errors);
                Console::output('Not saved');
            };
        }

    }
}
