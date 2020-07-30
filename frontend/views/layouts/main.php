<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\models\ChatMessages;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
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
       //ужно позже поределить главную страницу
        //echo $flag_homepage;
        if (Yii::$app->user->isGuest) {
          $msg = ChatMessages::find()->one();
          $menuItems[] = ['label' => 'Registration', 'url' => ['site/signup']];
          $menuItems[] = ['label' => 'Login', 'url' => ['site/login']];
          $user_name = 'Cuest';
        }
        else {
          $msg = ChatMessages::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
          $menuItems[] = ['label' => 'Acount', 'url' => ['profile/index']];
          $menuItems[] = ['label' => 'AcountViev', 'url' => [Url::to(['user/update', 'id' => Yii::$app->user->identity->id])]];
          $menuItems[] = ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'];
          $user_name = Yii::$app->user->identity->username;
        }
        echo Menu::widget([
          'options'=> ['class'=>'nav-list'],
          'activeCssClass' => 'active',
          'firstItemCssClass'=>'logo',
          'itemOptions' => ['class'=>'nav-item'],
          'items' => $menuItems,
        ]);
        ?>
        <div class="avatar">
            <span><?php echo $user_name;?></span>
            <img src="<?= 'img/'.$msg->user->getAva()?>" width="50" height="50" alt="avatar">
        </div>
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
