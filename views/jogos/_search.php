<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Times;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'ID') ?>

    <?= $form->field($model, 'RODADA') ?>

    <?= $form->field($model, 'DATA_HORA') ?>

    <?php // $form->field($model, 'GOLS_CASA') ?>

    <?php // $form->field($model, 'GOLS_VISITANTE') ?>

    <?= $form->field($model, 'TIME_CASA_ID')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Times::find()->all(),'ID', 'APELIDO'),
	    'language' => 'pt',
	    'options' => ['placeholder' => 'Selecione o Time da Casa'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>

    <?= $form->field($model, 'TIME_VISITANTE_ID')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Times::find()->all(),'ID', 'APELIDO'),
	    'language' => 'pt',
	    'options' => ['placeholder' => 'Selecione o Time Visitante'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]); ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> <!-- Este botão não está fazendo merda nenhuma -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
