<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participantes */
/* @var $form ActiveForm */
?>
<div class="site-participantes">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'USUARIO_ID') ?>
        <?= $form->field($model, 'SALA_ID') ?>
        <?= $form->field($model, 'PONTUACAO') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-participantes -->
