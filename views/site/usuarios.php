<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
?>
<div class="site-usuarios">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'NOME') ?>
        <?= $form->field($model, 'ACEITA_TERMOS_USO') ?>
        <?= $form->field($model, 'DATA_NASCIMENTO') ?>
        <?= $form->field($model, 'LOGIN') ?>
        <?= $form->field($model, 'SENHA') ?>
        <?= $form->field($model, 'OBSERVACAO') ?>
        <?= $form->field($model, 'FACEBOOK') ?>
        <?= $form->field($model, 'APELIDO') ?>
        <?= $form->field($model, 'CELULAR') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-usuarios -->
