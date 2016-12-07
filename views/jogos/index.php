<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JogosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jogos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Incluir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'RODADA',
            [
                'attribute' => 'DATA_HORA',
                'format' => ['datetime', 'php:d/m/Y - H:i']
            ],     
            //'DATA_HORA',
            'GOLS_CASA',
            'GOLS_VISITANTE',
            // 'TIME_CASA_ID',
            // 'TIME_VISITANTE_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
