<?php
/* @var $this ReferralController */
/* @var $model Referral */

$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Referral', 'url'=>array('index')),
	array('label'=>'Create Referral', 'url'=>array('create')),
	array('label'=>'Update Referral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Referral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Referral', 'url'=>array('admin')),
);
?>

<h1>View Referral #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'referralCode',
		'referralId',
		'referralDate',
		'rstl_ids',
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
	),
)); ?>
