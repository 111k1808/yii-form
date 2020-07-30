<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ChatMessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\ChatMessages */

$this->title = 'Feedback form';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest) {
  $user_id = 1;
}
else {
  $user_id = Yii::$app->user->identity->id;
}
?>
<main>
    <h1 class="main-title"><?= Html::encode($this->title) ?></h1>
  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php if (Yii::$app->session->getFlash('success')): ?>
          <p>Message saved successfully</p>
    <?php else: ?>
          <p>The message was not validated</p>
    <?php endif; ?>
  <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <?php $form = ActiveForm::begin(); ?>

              <?= $form->field($searchModel, 'user_id',['template' => '{input}',
                'inputOptions' =>
                  ['value'=>$user_id]])->hiddenInput(); ?>
              <?= $form->field($searchModel, 'comment')->textarea(['id' => 4,
                'rows' => 5,
                'placeholder' => 'Write something!',
                'cols' => 50]) ?>

                <div class="form-group">
                  <?= Html::submitButton('Send', ['class' => '']) ?>
                </div>

              <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-6">
              <?php Pjax::begin(); ?>
              <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_list_item',
                'pager' => [
                  'hideOnSinglePage'=> true,
                  'maxButtonCount' => 3,
                ],
              ]) ?>

              <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</main>