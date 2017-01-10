<?php
/* @var $this ReferralController */
/* @var $data Referral */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referralCode')); ?>:</b>
	<?php echo CHtml::encode($data->referralCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referralId')); ?>:</b>
	<?php echo CHtml::encode($data->referralId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referralDate')); ?>:</b>
	<?php echo CHtml::encode($data->referralDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rstl_ids')); ?>:</b>
	<?php echo CHtml::encode($data->rstl_ids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rstl_id')); ?>:</b>
	<?php echo CHtml::encode($data->rstl_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('labId')); ?>:</b>
	<?php echo CHtml::encode($data->labId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('customerId')); ?>:</b>
	<?php echo CHtml::encode($data->customerId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paymentType')); ?>:</b>
	<?php echo CHtml::encode($data->paymentType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orId')); ?>:</b>
	<?php echo CHtml::encode($data->orId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reportDue')); ?>:</b>
	<?php echo CHtml::encode($data->reportDue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conforme')); ?>:</b>
	<?php echo CHtml::encode($data->conforme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receivedBy')); ?>:</b>
	<?php echo CHtml::encode($data->receivedBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cancelled')); ?>:</b>
	<?php echo CHtml::encode($data->cancelled); ?>
	<br />

	*/ ?>

</div>