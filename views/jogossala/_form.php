<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogos-sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SALA_ID')->textInput() ?>

    <?= $form->field($model, 'JOGO_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
