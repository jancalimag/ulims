<?php
/* @var $this ReferralController */
/* @var $model Referral */

$this->breadcrumbs=array(
	'Referrals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Referral', 'url'=>array('index')),
	array('label'=>'Create Referral', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#referral-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Referrals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'referral-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'referralCode',
		'referralId',
		'referralDate',
		'rstl_ids',
		'rstl_id',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
