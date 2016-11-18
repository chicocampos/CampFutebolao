<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Campeonatos */

$this->title = 'Cadastrar Campeonato';
$this->params['breadcrumbs'][] = ['label' => 'Campeonatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campeonatos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
