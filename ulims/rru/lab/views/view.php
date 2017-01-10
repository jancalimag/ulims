<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\lab\models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'requestRefNum',
            'requestId',
            'requestDate',
            'requestTime',
            'rstl_id',
            'labId',
            'customerId',
            'paymentType',
            'discount',
            'orId',
            'total',
            'reportDue',
            'conforme',
            'receivedBy',
            'cancelled',
            'reported',
            'analysts',
            'remarks:ntext',
            'man_hour',
            'determination',
            'released',
            'create_time',
        ],
    ]) ?>

</div>
