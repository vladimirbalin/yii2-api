<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $phone
 * @property string $password_hash
 * @property string $access_token
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return "{{%users}}";
    }

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['password_hash']);

        return $fields;
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->andWhere(['access_token' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return ActiveRecord|array|null
     */
    public static function findByUsername($username)
    {
        return self::find()->andWhere(['username' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
