<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model coder\test\models\Blud */

$this->title = 'Добавить Блюдо';
$this->params['breadcrumbs'][] = ['label' => 'Блюдо', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
