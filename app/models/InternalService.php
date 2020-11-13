<?php
namespace app\models;

use app\tables\InternalServices;

class InternalService extends InternalServices
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'access_token' => 'Токен',
        ];
    }

    public function rules()
    {
        return [['name', 'required']];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->setAttribute('access_token', \Yii::$app->security->generateRandomString(100));
        }
        return parent::beforeSave($insert);
    }
}
