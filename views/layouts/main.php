<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'CampFutebolão',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        /*'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Campeonatos', 'url' => ['/campeonatos/index']],
            ['label' => 'Times', 'url' => ['/times/index']],
            ['label' => 'Jogos', 'url' => ['/jogos/index']],
            ['label' => 'Jogos-Sala', 'url' => ['/jogos-sala/index']],
            ['label' => 'Salas', 'url' => ['/salas/index']],
            ['label' => 'Participantes', 'url' => ['/participantes/index']],
            ['label' => 'Usuários', 'url' => ['/usuarios/index']],
            ['label' => 'Apostas', 'url' => ['/apostas/index']],
            ['label' => 'Sobre', 'url' => ['/site/about']],
            ['label' => 'Contato', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->NOME . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],*/
        
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => true],
            ['label' => 'Campeonatos', 'url' => ['/campeonatos/index'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->SUPERADMIN == 1],
            ['label' => 'Times', 'url' => ['/times/index'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->SUPERADMIN == 1],
            ['label' => 'Jogos', 'url' => ['/jogos/index'], 'visible' => true],
            //['label' => 'Jogos-Sala', 'url' => ['/jogos-sala/index'], 'visible' => Yii::$app->user->identity],
            ['label' => 'Salas', 'url' => ['/salas/index'], 'visible' => !Yii::$app->user->isGuest],
            //['label' => 'Participantes', 'url' => ['/participantes/index']],
            ['label' => 'Usuários', 'url' => ['/usuarios/index'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->SUPERADMIN == 1],
            //['label' => 'Apostas', 'url' => ['/apostas/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Sobre', 'url' => ['/site/about'], 'visible' => true],
            //['label' => 'Contato', 'url' => ['/site/contact'], 'visible' => true],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->LOGIN . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
        
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php /* Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Campos <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
