<?php

namespace app\modules\api\models;

use app\models\User;
use app\resources\UserResource;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_confirm'], 'required'],
            ['email', 'email'],
            [
                ['username', 'email'],
                'unique',
                'targetClass' => User::class,
                'targetAttribute' => ['username', 'email']],
            [
                'password_confirm',
                'compare',
                'compareAttribute' => 'password',
                'message' => "Passwords don't match"
            ]
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->access_token = Yii::$app->security->generateRandomString(255);

            return $user->save();
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|array|\yii\db\ActiveRecord|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserResource::findByUsername($this->username);
        }

        return $this->_user;
    }
}
