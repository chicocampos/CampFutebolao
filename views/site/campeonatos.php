<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campeonatos */
/* @var $form ActiveForm */
?>
<div class="site-campeonatos">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'NOME') ?>
        <?= $form->field($model, 'DIVISAO') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-campeonatos -->
