<?php

namespace coder\test\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $data = \coder\test\models\Ingredient::find()->asArray()->all();
        $name = [];
        foreach ($data as $v){
            $name[$v['name']]=$v['name'];
        }
        return $this->render('index',['data'=>$name]);
    }

    public function actionFind(){

        if(Yii::$app->request->post()){
            $count = Yii::$app->request->post('Ingredient')['name'];
            $find = [];
            foreach($count as $v){
                $query = \coder\test\models\Blud_Ing::find()
                    ->joinWith('ingr')
                    ->andFilterWhere(['LIKE', 'ingredient.name', $v])->all();
                        foreach ($query as $k=>$v){
                            $find[$v->id_blud][$v->id_ing][]=$v->id;
                        }
            }

        }
        $data = \coder\test\models\Ingredient::find()->asArray()->all();
        $name = [];
        foreach ($data as $v){
            $name[$v['name']]=$v['name'];
        }
        return $this->render('index',['data'=>$name,'find'=>$find]);

    }
}
