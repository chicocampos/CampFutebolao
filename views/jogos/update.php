<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jogos */

$this->title = 'Atualizar Jogo: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jogos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
