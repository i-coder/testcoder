<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model coder\test\models\Blud */

$this->title = $model->text;
$this->params['breadcrumbs'][] = ['label' => 'Блюдо', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',

        ],
    ]);?>

    <?php
    $m = \coder\test\models\Blud_Ing::find()->with('ingr')->where(['id_blud'=>$model->id])->all();
    echo "<h2>Ингредиенты</h2>";
        foreach($m as $v){
            foreach($v->ingr as $k2=>$v2){
               echo "<h4><span class=\"label label-default\">".$v2->name."</span></h4> ";
            }
        }
    ?>

</div>
