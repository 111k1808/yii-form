<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $modelImage  frontend\models\UploadImage*/

$this->title = 'Account: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<main>
    <h1 class="main-title"><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['action'=>$model->id, 'options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-sm">
                        <img class="avatar" src="/<?=$model->avatar?>" width="156" height="156" alt="avatar">
                    </div>
                    <div class="col-sm">
                      <?= Html::a("Change avatar", ['upload'], ['style' => ['text-decoration' => 'none',
                                                                                    'background-color' => 'lawngreen',
                                                                                    'color'=> 'deeppink',
                                                                                    'padding'=> '10px 25px',
                                                                                    'margin'=> '10px',
                                                                                    'display'=> 'block',
                                                                                    'width'=> '150px',
                                                                                    'border-radius'=>'5px']]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'avatar')->textInput() ?>

                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'updated_at')->textInput() ?>
                    <?php // Html::a("passwordChange", ['user/passwordChange']); ?>

                </div>
                <div class="col-md-12 text-center form-group">
                  <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</main>

