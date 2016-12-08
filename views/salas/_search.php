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

    <?php // $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NOME') ?>

    <?= $form->field($model, 'VALOR_ENTRADA') ?>

    <?php // $form->field($model, 'OBSERVACAO') ?>

    <?= $form->field($model, 'ACERTO_RESULTADO') ?>

    <?= $form->field($model, 'ACERTO_TIME_CASA') ?>

    <?= $form->field($model, 'ACERTO_TIME_VISITANTE') ?>

    <?= $form->field($model, 'ACERTO_DIFERENCA') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
