<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property string $requestRefNum
 * @property string $requestId
 * @property string $requestDate
 * @property string $requestTime
 * @property integer $rstl_id
 * @property integer $labId
 * @property integer $customerId
 * @property integer $paymentType
 * @property integer $discount
 * @property integer $orId
 * @property double $total
 * @property string $reportDue
 * @property string $conforme
 * @property string $receivedBy
 * @property integer $cancelled
 * @property string $reported
 * @property string $analysts
 * @property string $remarks
 * @property string $man_hour
 * @property integer $determination
 * @property string $released
 * @property string $create_time
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['requestRefNum', 'requestId', 'requestDate', 'requestTime', 'rstl_id', 'labId', 'customerId', 'paymentType', 'discount', 'orId', 'total', 'reportDue', 'conforme', 'receivedBy', 'cancelled'], 'required'],
            [['requestDate', 'reportDue', 'reported', 'man_hour', 'released', 'create_time'], 'safe'],
            [['rstl_id', 'labId', 'customerId', 'paymentType', 'discount', 'orId', 'cancelled', 'determination'], 'integer'],
            [['total'], 'number'],
            [['remarks'], 'string'],
            [['requestRefNum', 'requestId', 'conforme', 'receivedBy'], 'string', 'max' => 50],
            [['requestTime'], 'string', 'max' => 25],
            [['analysts'], 'string', 'max' => 256],
            [['requestRefNum', 'requestId'], 'unique', 'targetAttribute' => ['requestRefNum', 'requestId'], 'message' => 'The combination of Request Ref Num and Request ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requestRefNum' => 'Request Ref Num',
            'requestId' => 'Request ID',
            'requestDate' => 'Request Date',
            'requestTime' => 'Request Time',
            'rstl_id' => 'Rstl ID',
            'labId' => 'Lab ID',
            'customerId' => 'Customer ID',
            'paymentType' => 'Payment Type',
            'discount' => 'Discount',
            'orId' => 'Or ID',
            'total' => 'Total',
            'reportDue' => 'Report Due',
            'conforme' => 'Conforme',
            'receivedBy' => 'Received By',
            'cancelled' => 'Cancelled',
            'reported' => 'Reported',
            'analysts' => 'Analysts',
            'remarks' => 'Remarks',
            'man_hour' => 'Man Hour',
            'determination' => 'Determination',
            'released' => 'Released',
            'create_time' => 'Create Time',
        ];
    }

    /**
     * @inheritdoc
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
