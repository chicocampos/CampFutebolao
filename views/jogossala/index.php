<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JogosSalaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jogos Salas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogos-sala-index">

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
            'SALA_ID',
            'JOGO_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
