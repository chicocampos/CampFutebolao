<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Salas */
/* @var $form ActiveForm */
?>
<div class="site-salas">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'NOME') ?>
        <?= $form->field($model, 'VALOR_ENTRADA') ?>
        <?= $form->field($model, 'OBSERVACAO') ?>
        <?= $form->field($model, 'ACERTO_RESULTADO') ?>
        <?= $form->field($model, 'ACERTO_TIME_CASA') ?>
        <?= $form->field($model, 'ACERTO_TIME_VISITANTE') ?>
        <?= $form->field($model, 'ACERTO_DEFERENCA') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-salas -->
