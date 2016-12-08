<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Apostas */

$this->title = 'Aposta: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Apostas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apostas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'ID' => $model->ID, 'USUARIO_ID' => $model->USUARIO_ID, 'JOGO_SALA_ID' => $model->JOGO_SALA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ID' => $model->ID, 'USUARIO_ID' => $model->USUARIO_ID, 'JOGO_SALA_ID' => $model->JOGO_SALA_ID], [
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
            //'ID',
            //'USUARIO_ID',
            //'JOGO_SALA_ID',
            'RESULTADO_CASA',
            'RESULTADO_VISITANTE',
        ],
    ]) ?>

</div>
