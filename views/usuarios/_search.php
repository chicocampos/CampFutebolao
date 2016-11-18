<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NOME') ?>

    <?= $form->field($model, 'APELIDO') ?>

    <?= $form->field($model, 'ACEITA_TERMOS_USO') ?>

    <?= $form->field($model, 'DATA_NASCIMENTO') ?>

    <?php // echo $form->field($model, 'LOGIN') ?>

    <?php // echo $form->field($model, 'SENHA') ?>

    <?php // echo $form->field($model, 'FACEBOOK') ?>

    <?php // echo $form->field($model, 'CELULAR') ?>

    <?php // echo $form->field($model, 'OBSERVACAO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
