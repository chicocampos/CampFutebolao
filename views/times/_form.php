<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Campeonatos;

/* @var $this yii\web\View */
/* @var $model app\models\Times */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="times-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SIGLA')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'CAMPEONATOS_ID')->dropDownList(
    	ArrayHelper::map(Campeonatos::find()->all(), 'ID', 'DIVISAO', 'NOME'),
    	['prompt'=>'Selecione o Campeonato']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
