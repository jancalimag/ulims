<?php

namespace app\modules\lab;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\modules\lab\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rstl_id', 'labId', 'customerId', 'paymentType', 'discount', 'orId', 'cancelled', 'determination'], 'integer'],
            [['requestRefNum', 'requestId', 'requestDate', 'requestTime', 'reportDue', 'conforme', 'receivedBy', 'reported', 'analysts', 'remarks', 'man_hour', 'released', 'create_time'], 'safe'],
            [['total'], 'number'],
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
        $query = Request::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'requestDate' => $this->requestDate,
            'rstl_id' => $this->rstl_id,
            'labId' => $this->labId,
            'customerId' => $this->customerId,
            'paymentType' => $this->paymentType,
            'discount' => $this->discount,
            'orId' => $this->orId,
            'total' => $this->total,
            'reportDue' => $this->reportDue,
            'cancelled' => $this->cancelled,
            'reported' => $this->reported,
            'man_hour' => $this->man_hour,
            'determination' => $this->determination,
            'released' => $this->released,
            'create_time' => $this->create_time,
        ]);

        $query->andFilterWhere(['like', 'requestRefNum', $this->requestRefNum])
            ->andFilterWhere(['like', 'requestId', $this->requestId])
            ->andFilterWhere(['like', 'requestTime', $this->requestTime])
            ->andFilterWhere(['like', 'conforme', $this->conforme])
            ->andFilterWhere(['like', 'receivedBy', $this->receivedBy])
            ->andFilterWhere(['like', 'analysts', $this->analysts])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
