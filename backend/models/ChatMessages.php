<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "chat_messages".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $comment
 * @property string|null $creation_time
 */
class ChatMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['comment'], 'string'],
            [['creation_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'creation_time' => 'Creation Time',
        ];
    }

  /**
   * Gets query for [[user]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::class, ['id' => 'user_id']);
  }

  public function getAva()
  {

    if($this->user_id!==null){
      return $this->user->ava;
    }
    return 'guest.jpg';
  }
}
