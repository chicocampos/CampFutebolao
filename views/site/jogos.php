<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jogos */
/* @var $form ActiveForm */
?>
<div class="site-jogos">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'RODADA') ?>
        <?= $form->field($model, 'DATA_HORA') ?>
        <?= $form->field($model, 'TIME_CASA_ID') ?>
        <?= $form->field($model, 'TIME_VISITANTE_ID') ?>
        <?= $form->field($model, 'GOLS_CASA') ?>
        <?= $form->field($model, 'GOLS_VISITANTE') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-jogos -->
