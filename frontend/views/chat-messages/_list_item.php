<?php
/* @var $dataProvider yii\data\ActiveDataProvider */


use app\models\ChatMessages;

if (Yii::$app->user->isGuest) {
  $msg = ChatMessages::find()->one();

}
else {
  $msg = ChatMessages::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-6">
          <?=''?>
        <img src="<?= 'img/'.$msg->user->getAva()?>" alt="avatar" width="50" height="50">
        <p><?= $model['creation_time']?></p>
      </div>
      <div class="col-6">
        <h3><?= $model['user']->username?></h3>
        <p><?= $model['comment']?></p>
      </div>
    </div>
  </div>

</div>