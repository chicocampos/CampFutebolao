<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JogosSala */

$this->title = 'Cadastrar Jogo Sala';
$this->params['breadcrumbs'][] = ['label' => 'Jogos Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogos-sala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'salas' => $salas,
        //'jogos' => $jogos,
    ]) ?>

</div>
