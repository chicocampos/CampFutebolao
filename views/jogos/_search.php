<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'RODADA') ?>

    <?= $form->field($model, 'DATA_HORA') ?>

    <?= $form->field($model, 'GOLS_CASA') ?>

    <?= $form->field($model, 'GOLS_VISITANTE') ?>

    <?php // echo $form->field($model, 'TIME_CASA_ID') ?>

    <?php // echo $form->field($model, 'TIME_VISITANTE_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
