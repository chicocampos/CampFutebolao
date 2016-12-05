<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jogos */

$this->title = 'Jogo: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma a exclusão deste item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'RODADA',
            'DATA_HORA',
            'GOLS_CASA',
            'GOLS_VISITANTE',
            'TIME_CASA_ID',
            'TIME_VISITANTE_ID',
        ],
    ]) ?>

</div>
