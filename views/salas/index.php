<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Incluir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NOME',
            'VALOR_ENTRADA',
            'OBSERVACAO:ntext',
            'ACERTO_RESULTADO',
            // 'ACERTO_TIME_CASA:datetime',
            // 'ACERTO_TIME_VISITANTE:datetime',
            // 'ACERTO_DIFERENCA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
