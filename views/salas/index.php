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
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Incluir', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'NOME',
            'VALOR_ENTRADA',
//            'OBSERVACAO:ntext',
            [
                'attribute' => 'jogo',
                 'label' => 'Jogos',
                'value' => function($model) {
                    return $model->jogo->apresentacao;
                }
            ],
//            'salas.jogossala.jogos.apresentacao',
            'ACERTO_RESULTADO',
            'ACERTO_TIME_CASA',
            'ACERTO_TIME_VISITANTE',
            'ACERTO_DIFERENCA',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete} {update}',
                'buttons' => [
                    'update' => function ($url, $model){
                        return $model->ADMINISTRADOR == Yii::$app->user->identity->ID ?
                        Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url,['title'=>Yii::t('yii','update'),]) : '';
                    },
                    'delete' => function ($url, $model){
                        return $model->ADMINISTRADOR == Yii::$app->user->identity->ID ?
                        Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,['title'=>Yii::t('yii','delete'),]) : '';
                    }
                ]
            ],
        ],
    ]); ?>
</div>
