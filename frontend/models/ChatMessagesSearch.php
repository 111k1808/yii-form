<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ChatMessagesSearch represents the model behind the search form of `app\models\ChatMessages`.
 */
class ChatMessagesSearch extends ChatMessages
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id', 'user_id'], 'integer'],
      [['comment'], 'required'],
      [['comment', 'creation_time'], 'safe'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function scenarios()
  {
    // bypass scenarios() implementation in the parent class
    return Model::scenarios();
  }

  /**
   * Creates data provider instance with search query applied
   *
   * @param array $params
   *
   * @return ActiveDataProvider
   */
  public function search($params)
  {
    $query = ChatMessages::find()
      ->joinWith('user');

    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'Pagination' => [
        'pageSize' =>5,
      ],
      'sort' => [
        'defaultOrder' => [
          'creation_time' => SORT_DESC,
        ]
      ],
    ]);

    $this->load($params);

    if (!$this->validate()) {
      // uncomment the following line if you do not want to return any records when validation fails
      // $query->where('0=1');
      return $dataProvider;
    }

    // grid filtering conditions
    $query->andFilterWhere([
      'id' => $this->id,
      'user_id' => $this->user_id,
      'creation_time' => $this->creation_time,
    ]);

    $query->andFilterWhere(['like', 'comment', $this->comment]);

    return $dataProvider;
  }

  public function save($runValidation = true, $attributeNames = null) {
    if ($this->getIsNewRecord()) {
      return $this->insert($runValidation, $attributeNames);
    } else {
      return $this->update($runValidation, $attributeNames) !== false;
    }
  }
}