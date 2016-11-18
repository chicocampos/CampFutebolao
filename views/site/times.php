<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Times */
/* @var $form ActiveForm */
?>
<div class="site-times">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'NOME') ?>
        <?= $form->field($model, 'CAMPEONATOS_ID') ?>
        <?= $form->field($model, 'APELIDO') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-times -->
