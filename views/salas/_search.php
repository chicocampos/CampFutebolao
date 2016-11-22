<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NOME') ?>

    <?= $form->field($model, 'VALOR_ENTRADA') ?>

    <?= $form->field($model, 'OBSERVACAO') ?>

    <?= $form->field($model, 'ACERTO_RESULTADO') ?>

    <?php // echo $form->field($model, 'ACERTO_TIME_CASA') ?>

    <?php // echo $form->field($model, 'ACERTO_TIME_VISITANTE') ?>

    <?php // echo $form->field($model, 'ACERTO_DIFERENCA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
