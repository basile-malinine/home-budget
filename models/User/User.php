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

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'pass_hash'], 'required'],
            [['name', 'pass_hash'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Адрес электронной почты',
            'active' => 'Статус',
        ];
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
