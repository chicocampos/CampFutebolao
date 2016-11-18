<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Times;
use kartik\select2\Select2;
//use kartik\datetime\DateTimePicker;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Jogos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RODADA')->textInput() ?>

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

	<?= $form->field($model, 'DATA_HORA')->widget(DateControl::className(), [
	    'type' => DateControl::FORMAT_DATETIME,
	    'displayFormat' => 'dd/MM/yyyy HH:mm',
	    'saveFormat' => 'php:Y-m-d H:i:s',
	    //'options' => [
	    //	'mask' => '99/99/9999'
	    //] Isso não estava funcionando
	]); ?>

	<?= $form->field($model, 'GOLS_CASA')->textInput() ?>

    <?= $form->field($model, 'GOLS_VISITANTE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
