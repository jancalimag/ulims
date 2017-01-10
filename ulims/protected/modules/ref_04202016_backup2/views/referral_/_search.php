<?php
/* @var $this ReferralController */
/* @var $model Referral */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referralCode'); ?>
		<?php echo $form->textField($model,'referralCode',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referralId'); ?>
		<?php echo $form->textField($model,'referralId',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referralDate'); ?>
		<?php echo $form->textField($model,'referralDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rstl_ids'); ?>
		<?php echo $form->textField($model,'rstl_ids',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rstl_id'); ?>
		<?php echo $form->textField($model,'rstl_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'labId'); ?>
		<?php echo $form->textField($model,'labId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customerId'); ?>
		<?php echo $form->textField($model,'customerId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paymentType'); ?>
		<?php echo $form->textField($model,'paymentType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orId'); ?>
		<?php echo $form->textField($model,'orId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reportDue'); ?>
		<?php echo $form->textField($model,'reportDue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conforme'); ?>
		<?php echo $form->textField($model,'conforme',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receivedBy'); ?>
		<?php echo $form->textField($model,'receivedBy',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cancelled'); ?>
		<?php echo $form->textField($model,'cancelled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->