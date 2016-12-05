<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use app\models\JogosSala;
use app\models\Times;

/* @var $this yii\web\View */
/* @var $model app\models\Salas */

$this->title = 'Sala: ' . $model->NOME;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $model->ADMINISTRADOR == Yii::$app->user->identity->ID ? Html::a('Alterar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) : '';?>
        <?= $model->ADMINISTRADOR == Yii::$app->user->identity->ID ? Html::a('Excluir', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma a exclusão deste item?',
                'method' => 'post',
            ],
        ]) : '';?>
        <?= $participa ? '' : Html::a('Participar', ['join', 'id' => $model->ID], ['class' => 'btn btn-primary']); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            'NOME',
            'VALOR_ENTRADA',
            'OBSERVACAO:ntext',
            'ACERTO_RESULTADO',
            'ACERTO_TIME_CASA',
            'ACERTO_TIME_VISITANTE',
            'ACERTO_DIFERENCA',
        ],
    ]);
        $i = 1;
        foreach($model->jogos as $jogo) :
        $jogoSala = JogosSala::find()->where(['SALA_ID'=>$model->ID])->andWhere(['JOGO_ID' => $jogo->ID])->one();
            echo 'Jogo '.$i.': '. $jogo->apresentacao .
                ' <a class="btn btn-success" href="/campfutebolao/web/index.php?r=apostas%2fcreate&JOGO_SALA_ID='.$jogoSala->ID.'">APOSTAR </a>';
            echo "<br>";
            $i++;
        endforeach;

    ?>

</div>
