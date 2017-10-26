<?php

namespace coder\test\models;

use Yii;
use yii\base\Model;


class Blud_Ing extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'blud_ing';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_blud','id_ing'], 'safe'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_blud' => Yii::t('app', 'Название'),
            'id_ing' => Yii::t('app', 'Ингредиент'),

        ];
    }
    public function getIngr()
    {
        return $this->hasMany(Ingredient::className(), ['id' => 'id_ing']);
    }
    public function getBluds()
    {
        return $this->hasMany(Blud::className(), ['id' => 'id_blud']);
    }

}