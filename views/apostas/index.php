<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApostasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apostas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apostas-index">

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
            'USUARIO_ID',
            'JOGO_SALA_ID',
            'RESULTADO_CASA',
            'RESULTADO_VISITANTE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
