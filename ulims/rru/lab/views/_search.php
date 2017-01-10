<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\lab\models\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'requestRefNum') ?>

    <?= $form->field($model, 'requestId') ?>

    <?= $form->field($model, 'requestDate') ?>

    <?= $form->field($model, 'requestTime') ?>

    <?php // echo $form->field($model, 'rstl_id') ?>

    <?php // echo $form->field($model, 'labId') ?>

    <?php // echo $form->field($model, 'customerId') ?>

    <?php // echo $form->field($model, 'paymentType') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'orId') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'reportDue') ?>

    <?php // echo $form->field($model, 'conforme') ?>

    <?php // echo $form->field($model, 'receivedBy') ?>

    <?php // echo $form->field($model, 'cancelled') ?>

    <?php // echo $form->field($model, 'reported') ?>

    <?php // echo $form->field($model, 'analysts') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'man_hour') ?>

    <?php // echo $form->field($model, 'determination') ?>

    <?php // echo $form->field($model, 'released') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
