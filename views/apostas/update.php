<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apostas */

$this->title = 'Atualizar Aposta: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Apostas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'USUARIO_ID' => $model->USUARIO_ID, 'JOGO_SALA_ID' => $model->JOGO_SALA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apostas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
