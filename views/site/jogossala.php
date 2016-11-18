<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */
/* @var $form ActiveForm */
?>
<div class="site-jogossala">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'SALA_ID') ?>
        <?= $form->field($model, 'JOGO_ID') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-jogossala -->
