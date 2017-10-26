<?php

namespace coder\test\models;

use Yii;
use yii\base\Model;


class Blud extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'blud';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['text','ing'], 'safe'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Название'),
            'ing' => Yii::t('app', 'Ингредиент'),

        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
    }

    public function getIngr()
    {
        return $this->hasMany(Blud_Ing::className(), ['id_blud' => 'id']);
    }
}