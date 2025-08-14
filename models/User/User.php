<?php

namespace app\models\User;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $pass_hash
 * @property int $active
 */
class User extends ActiveRecord implements IdentityInterface
{
    const ACTIVE = [
        0 => 'Неактивный',
        1 => 'Активный',
    ];

    public $password = '';
    public $password_submit = '';

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'password', 'password_submit'], 'required'],
            [['name', 'email', 'password', 'password_submit'], 'string'],
            [['name', 'email', 'password', 'password_submit'], 'trim'],
            [['email'], 'email'],
            [['name', 'email'], 'unique'],
            [['password_submit'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Адрес электронной почты',
            'active' => 'Статус',
            'password' => 'Пароль',
            'password_submit' => 'Подтверждение пароля',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->pass_hash = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }

        return true;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return null;
    }

    public static function findByEmail($email)
    {
        $user = self::findOne(['email' => $email]);
        if ($user) {
            return new static($user);
        }

        return null;
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
        // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->pass_hash);
    }
}
