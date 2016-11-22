<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salas */

$this->title = 'Sala: ' . $model->NOME;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->ID], [
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
            'NOME',
            'VALOR_ENTRADA',
            'OBSERVACAO:ntext',
            'ACERTO_RESULTADO',
            'ACERTO_TIME_CASA:datetime',
            'ACERTO_TIME_VISITANTE:datetime',
            'ACERTO_DIFERENCA',
        ],
    ]) ?>

</div>
