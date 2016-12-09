<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Times */

$this->title = 'Time: ' . $model->APELIDO;
$this->params['breadcrumbs'][] = ['label' => 'Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="times-view">

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
            //'ID',
            'NOME',
            'APELIDO',
            //'CAMPEONATOS_ID',
            [
                'label' => 'Campeonato',
                'value' =>  call_user_func(function($model) {
                    return "{$model->campeonatos->NOME} - {$model->campeonatos->DIVISAO}";
                }, $model)
            ], 
            'SIGLA',
        ],
    ]) ?>

</div>
