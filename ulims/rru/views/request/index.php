<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'requestRefNum',
            // 'requestId',
            // 'requestDate',
            // 'requestTime',
            // 'rstl_id',
            // 'labId',
            // 'customerId',
            // 'paymentType',
            // 'discount',
            // 'orId',
            // 'total',
            // 'reportDue',
            // 'conforme',
            // 'receivedBy',
            'cancelled',
            'reported',
            'analysts',
            'remarks:ntext',
            'man_hour',
            'determination',
            'released',
            // 'create_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
