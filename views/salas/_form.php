<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Salas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VALOR_ENTRADA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ACERTO_RESULTADO')->textInput() ?>

    <?= $form->field($model, 'ACERTO_TIME_CASA')->textInput() ?>

    <?= $form->field($model, 'ACERTO_TIME_VISITANTE')->textInput() ?>

    <?= $form->field($model, 'ACERTO_DIFERENCA')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
