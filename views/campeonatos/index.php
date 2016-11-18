<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampeonatosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campeonatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campeonatos-index">

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
            'DIVISAO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
