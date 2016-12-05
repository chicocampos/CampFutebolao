<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA_NASCIMENTO')->textInput(['type'=>'date', 'maxlength' => true, 'max' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'LOGIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SENHA')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ACEITA_TERMOS_USO')->checkbox(['1'=>'Aceito']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
