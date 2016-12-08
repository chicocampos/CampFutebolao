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

    <?= "<br><strong>Termos de uso</strong>.
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque porro earum quam, similique, molestias cupiditate esse repellat amet sed eum ipsum, suscipit, libero fuga voluptatem commodi hic odio eligendi.lorem loermlore Lorem ipsum dolor sit amet, consectetur adipisicing elit. In rerum deserunt neque enim temporibus, laudantium nulla laboriosam ut nobis, eum molestiae assumenda magnam labore. Dignissimos, inventore! Ut similique, sit laboriosam?
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque porro earum quam, similique, molestias cupiditate esse repellat amet sed eum ipsum, suscipit, libero fuga voluptatem commodi hic odio eligendi.lorem loermlore Lorem ipsum dolor sit amet, consectetur adipisicing elit. In rerum deserunt neque enim temporibus, laudantium nulla laboriosam ut nobis, eum molestiae assumenda magnam labore. Dignissimos, inventore! Ut similique, sit laboriosam?Lorem ipsum dolor sit amet
        
        <br>
        <br>
    " ?>
    


    <?= $form->field($model, 'ACEITA_TERMOS_USO')->checkbox(['1'=>'Aceito']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Confirmar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
