<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */

$this->title = 'Atualizar Jogo Sala: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jogos Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'SALA_ID' => $model->SALA_ID, 'JOGO_ID' => $model->JOGO_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jogos-sala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'salas' => $salas,
    ]) ?>

</div>
