<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */

$this->title = 'Jogos_Sala: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Jogos Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogos-sala-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'ID' => $model->ID, 'SALA_ID' => $model->SALA_ID, 'JOGO_ID' => $model->JOGO_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ID' => $model->ID, 'SALA_ID' => $model->SALA_ID, 'JOGO_ID' => $model->JOGO_ID], [
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
            'SALA_ID',
            'JOGO_ID',
        ],
    ]) ?>

</div>
