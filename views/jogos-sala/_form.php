<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Jogos;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogos-sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'SALA_ID')->textInput() ?>

    <?php // $form->field($model, 'JOGO_ID')->textInput() ?>
    
<!--Salas-->
    
    <?= $form->field($salas, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($salas, 'VALOR_ENTRADA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($salas, 'OBSERVACAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($salas, 'ACERTO_RESULTADO')->textInput() ?>

    <?= $form->field($salas, 'ACERTO_TIME_CASA')->textInput() ?>

    <?= $form->field($salas, 'ACERTO_TIME_VISITANTE')->textInput() ?>

    <?= $form->field($salas, 'ACERTO_DIFERENCA')->textInput() ?>
    
<!--Jogos-->
    
    <?= $form->field($model, 'JOGO_ID')->dropDownList(
    	ArrayHelper::map(Jogos::find()->all(), 'ID', 'ID'),
    	['prompt'=>'Selecione o Jogo']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
