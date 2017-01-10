<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\lab\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'requestRefNum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requestId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requestDate')->textInput() ?>

    <?= $form->field($model, 'requestTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rstl_id')->textInput() ?>

    <?= $form->field($model, 'labId')->textInput() ?>

    <?= $form->field($model, 'customerId')->textInput() ?>

    <?= $form->field($model, 'paymentType')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'orId')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'reportDue')->textInput() ?>

    <?= $form->field($model, 'conforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receivedBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cancelled')->textInput() ?>

    <?= $form->field($model, 'reported')->textInput() ?>

    <?= $form->field($model, 'analysts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'man_hour')->textInput() ?>

    <?= $form->field($model, 'determination')->textInput() ?>

    <?= $form->field($model, 'released')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
