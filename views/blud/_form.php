<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model coder\test\models\Blud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blud-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'text')->textarea() ?>

    <?php
    $ing = \coder\test\models\Ingredient::findAll(['status' => 1,]);
    foreach($ing as $k=>$v){?>
        <?php if(\coder\test\models\Blud_Ing::find()->where(['id_blud'=>$model->id])->andWhere(['id_ing'=>$v->id])->one()){?>
            <?= Html::checkbox('ing[]', true, ['value' => $v->id, 'label' => $v->name]);?>
        <?php }else{?>

            <?= Html::checkbox('ing[]', false, ['value' => $v->id, 'label' => $v->name]);?>
        <?php }?>
    <?php }?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
