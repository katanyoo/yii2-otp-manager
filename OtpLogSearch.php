<?php

namespace katanyoo\otpmanager;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use katanyoo\otpmanager\OtpLog;

/**
 * OtpLogSearch represents the model behind the search form about `katanyoo\otpmanager\OtpLog`.
 */
class OtpLogSearch extends OtpLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'passcode', 'expire_time', 'verified'], 'integer'],
            [['telno', 'refcode'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = OtpLog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'passcode' => $this->passcode,
            'expire_time' => $this->expire_time,
            'verified' => $this->verified,
        ]);

        $query->andFilterWhere(['like', 'telno', $this->telno])
            ->andFilterWhere(['like', 'refcode', $this->refcode]);

        return $dataProvider;
    }
}
