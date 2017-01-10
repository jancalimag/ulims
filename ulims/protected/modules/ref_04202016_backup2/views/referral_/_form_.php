<?php
/* @var $this ReferralController */
/* @var $model Referral */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'referral-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'referralCode'); ?>
		<?php echo $form->textField($model,'referralCode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'referralCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referralId'); ?>
		<?php echo $form->textField($model,'referralId',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'referralId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referralDate'); ?>
		<?php echo $form->textField($model,'referralDate'); ?>
		<?php echo $form->error($model,'referralDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rstl_ids'); ?>
		<?php echo $form->textField($model,'rstl_ids',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'rstl_ids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rstl_id'); ?>
		<?php echo $form->textField($model,'rstl_id'); ?>
		<?php echo $form->error($model,'rstl_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'labId'); ?>
		<?php echo $form->textField($model,'labId'); ?>
		<?php echo $form->error($model,'labId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customerId'); ?>
		<?php echo $form->textField($model,'customerId'); ?>
		<?php echo $form->error($model,'customerId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paymentType'); ?>
		<?php echo $form->textField($model,'paymentType'); ?>
		<?php echo $form->error($model,'paymentType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount'); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orId'); ?>
		<?php echo $form->textField($model,'orId'); ?>
		<?php echo $form->error($model,'orId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reportDue'); ?>
		<?php echo $form->textField($model,'reportDue'); ?>
		<?php echo $form->error($model,'reportDue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conforme'); ?>
		<?php echo $form->textField($model,'conforme',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'conforme'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receivedBy'); ?>
		<?php echo $form->textField($model,'receivedBy',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'receivedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cancelled'); ?>
		<?php echo $form->textField($model,'cancelled'); ?>
		<?php echo $form->error($model,'cancelled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->