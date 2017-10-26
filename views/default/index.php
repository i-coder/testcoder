
<?php
use yii\helpers\Html;
use kartik\select2\Select2;
?>
<div class="news-update">
    <h2>Административная часть</h2>
    <h3>
        - <a href="<?=\Yii::$app->urlManager->createUrl(['testcoder/ingredient/index/'])?>"><?= Html::encode("Добавления ингредиентов") ?></a>
    </h3>
    <h3>
        - <a href="<?=\Yii::$app->urlManager->createUrl(['testcoder/blud/index/'])?>"><?= Html::encode("Формирования блюд из этих ингредиентов") ?></a>
    </h3>
<h2>
    Клиентская часть
</h2>
    <form action="<?=\Yii::$app->urlManager->createUrl(['testcoder/default/find/'])?>" method="post">

        <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
               value="<?=Yii::$app->request->csrfToken?>"/>
    <?php

    // With a model and without ActiveForm
    echo Select2::widget([
        'model' => new \coder\test\models\Ingredient(),
        'attribute' => 'name',
        'data' => $data,
        'options' => ['placeholder' => 'Select a state ...','multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
 ]);
    ?>
    <hr>
    <button class="btn btn-primary">Найти</button>
    </form>
    <?php
        if(isset($find)){

            foreach ($find as $k=>$v){
                echo '<h3>'.\coder\test\models\Blud::findOne($k)->text.'</h3>';
                    foreach($v as $k2=>$v2){
                        echo "<span class='label label-default'>";
                        echo \coder\test\models\Ingredient::findOne(\coder\test\models\Blud_Ing::findOne($v2)->id_ing)->name;
                        echo "</span> ";
                    };
            }

        }

    ?>
</div>