<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jogos;
use app\models\Times;
use kartik\select2\Select2;
//use kartik\widgets\Select2;

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
    
<!--    Seleção dos jogos   -->

    
    
    <?= 
        $form->field($jogos, 'ID')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Jogos::find()->all(),'ID', 'Apresentacao'),
	    'options' => ['placeholder' => 'Selecione o Jogo', 'multiple' => true],
	    'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
	    ],
	]);
    
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
