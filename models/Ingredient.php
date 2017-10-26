<?php

namespace coder\test\models;

use Yii;
use yii\base\Model;


class Ingredient extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'ingredient';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status'], 'integer'],
            [['name','status'], 'safe'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
    }
}