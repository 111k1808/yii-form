<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $model  frontend\models\UploadImage*/

?>
<main>
  <?php if($model->image): ?>
      <img src="/img/<?= $model->image?>" alt="">
  <?php endif; ?>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <button>Загрузить</button>
    <?php ActiveForm::end() ?>
  <?= Html::a("Profile", ['update', 'id' => Yii::$app->user->identity->id], ['style' => ['text-decoration' => 'none',
    'background-color' => 'lawngreen',
    'color'=> 'deeppink',
    'padding'=> '10px 25px',
    'margin'=> '10px',
    'display'=> 'block',
    'width'=> '150px',
    'border-radius'=>'5px']]); ?>
</main>
