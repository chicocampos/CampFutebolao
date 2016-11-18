<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apostas */
/* @var $form ActiveForm */
?>
<div class="site-apostas">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ID') ?>
        <?= $form->field($model, 'USUARIO_ID') ?>
        <?= $form->field($model, 'JOGO_SALA_ID') ?>
        <?= $form->field($model, 'RESULTADO_CASA') ?>
        <?= $form->field($model, 'RESULTADO_VISITANTE') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-apostas -->
