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
      $fName = "img/upload_".time().".".$this->image->extension;
      $this->image->saveAs($fName);
      debug($this->image);
      $userId = Yii::$app->user->identity->id;

      $str = Yii::$app->user->identity->avatar;
      if($str!=='/img/new-user.png'){
        if($str[0]=='/'){
          $delStr=ltrim($str, '/');
        }
        //вернуть unlink($delStr);
      }


      $user = User::find()->where(['id'=>$userId])->all();
      //$user->avatar= 32167;
      debug($user);
      //$user->Update();



    }else{
      return false;
    }
  }
}