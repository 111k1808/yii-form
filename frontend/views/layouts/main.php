<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <nav>
        <?php
        $menuItems[] = ['label' => 'Logo', 'url' => ['chat-messages/index']];
        $menuItems[] = ['label' => 'Acount', 'url' => ['site/signup']];
        $menuItems[] = ['label' => 'Registration', 'url' => ['site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest];
        echo Menu::widget([
          'options'=> ['class'=>'nav-list'],
          'activeCssClass' => 'active',
          'firstItemCssClass'=>'logo',
          'itemOptions' => ['class'=>'nav-item'],
          'items' => $menuItems,
        ]);
        ?>
       <!-- <ul class="nav-list">
            <li class="nav-item logo"><a href="" class="nav-link">Logo</a></li>
            <li class="nav-item"><a href="" class="nav-link">Feedback form</a></li>
            <li class="nav-item"><a href="" class="nav-link">Registration</a></li>
            <li class="nav-item" ><a href="" class="nav-link">Login</a></li>
        </ul>-->
    </nav>
</header>
<?= $content ?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                Contacts
            </div>
            <div class="col-md-4">
                Social icon
            </div>
            <div class="col-md-4">
                Copyright
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
