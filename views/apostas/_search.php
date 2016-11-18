<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApostasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apostas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'USUARIO_ID') ?>

    <?= $form->field($model, 'JOGO_SALA_ID') ?>

    <?= $form->field($model, 'RESULTADO_CASA') ?>

    <?= $form->field($model, 'RESULTADO_VISITANTE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
