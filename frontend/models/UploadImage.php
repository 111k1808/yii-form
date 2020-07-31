<?php


namespace frontend\models;


use common\models\User;
use Yii;
use yii\base\Model;

class UploadImage extends Model
{
  public $image;

  public function rules(){
    return[
      [['image'], 'file', 'extensions' => 'png, jpg'],
    ];
  }

  public function upload(){
    if($this->validate()){
      $this->image->saveAs("img/ava/ava".Yii::$app->user->id.".".$this->image->extension);
    }else{
      return false;
    }
  }

}