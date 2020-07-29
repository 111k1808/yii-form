<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
if (Yii::$app->user->isGuest) {
  $user_avatar = 'img/guest.jpg';
}
else {
  $user_avatar = $model['user']->avatar;
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-6">
        <img src="<?= $user_avatar?>" alt="avatar" width="50" height="50">
        <p><?= $model['creation_time']?></p>
      </div>
      <div class="col-6">
        <h3><?= $model['user']->username?></h3>
        <p><?= $model['comment']?></p>
      </div>
    </div>
  </div>

</div>