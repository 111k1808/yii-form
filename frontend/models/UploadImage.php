<?php


namespace frontend\models;


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
      $this->image->saveAs("img/{$this->image->baseName}.{$this->image->extension}");
    }else{
      return false;
    }
  }
}