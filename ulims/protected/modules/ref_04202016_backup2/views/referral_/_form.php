<?php
/* @var $this ReferralController */
/* @var $model Referral */
/* @var $form CActiveForm */
//Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
?>

<div class="form wide">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'referral-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));	
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<?php echo $form->errorSummary($model);?>
	<?php //echo $form->hiddenField($model,'id'); echo $_GET['id'];?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'lab_id'); ?>
		<?php echo $form->dropDownList($model,'lab_id', $labs, array('style'=>'width: 350px;')); ?>
		<?php echo $form->error($model,'lab_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->dropDownList($model,'customer_id', Agency::listData(), array('style'=>'width: 220px;')); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'referralDate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'name'=>'Referral[referralDate]',
						'value'=>$model->referralDate ? date('m/d/Y',strtotime($model->referralDate)) : date('m/d/Y'),
						// additional javascript options for the date picker plugin
						
						'options'=>array(
							'showAnim'=>'fold',
							),
						'htmlOptions'=>array(
							//'style'=>'height:8px; margin: 0px;'
							)
					));
				?>
		<?php echo $form->error($model,'referralDate'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'name'=>'Referral[create_time]',
						'value'=>$model->create_time ? date('m/d/Y',strtotime($model->create_time)) : date('m/d/Y'),
						// additional javascript options for the date picker plugin
						
						'options'=>array(
							'showAnim'=>'fold',
							),
						'htmlOptions'=>array(
							//'style'=>'height:8px; margin: 0px;'
							)
					));
				?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'paymentType_id'); ?>
		<div class="compactRadioGroup">
		<?php echo $form->radioButtonList($model, 'paymentType_id', array(1=>'PAID',2=>'FULLY SUBSIDIZED'),
						array( 'separator' => "  "));
		?>  
		</div>
		<?php echo $form->error($model,'paymentType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount_id'); ?>
		<?php echo $form->dropDownList($model,'discount_id', $discounts, array('style'=>'width: 220px;')); ?>
		<?php echo $form->error($model,'discount_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'reportDue'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'name'=>'Referral[reportDue]',
						'value'=>$model->reportDue ? date('m/d/Y',strtotime($model->reportDue)) : date('m/d/Y'),
						// additional javascript options for the date picker plugin
						
						'options'=>array(
							'showAnim'=>'fold',
							),
						'htmlOptions'=>array(
							//'style'=>'height:8px; margin: 0px;'
							)
					));
				?>
		<?php echo $form->error($model,'reportDue'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'conforme'); ?>
		<?php echo $form->textField($model,'conforme',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'conforme'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	
<!-- Customer Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogCustomer',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Add Customer',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>400,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Customer Dialog : End -->

<script type="text/javascript">
function addCustomer()
{
    <?php echo CHtml::ajax(array(
			'url'=>$this->createUrl('customer/create',array('id'=>$model->id)),
			'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogCustomer').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogCustomer form').submit(addCustomer);
                }
                else
                {
                    //$.fn.yiiGridView.update('sample-grid');
					$('#dialogCustomer').html(data.div);
                    setTimeout(\"$('#dialogCustomer').dialog('close') \",1000);
                }
 
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogCustomer").html(
						\'<div class="loader"><br\><br\>Generating form.<br\> Please wait...</div>\'
					);
             }',
			 'error'=>"function(referral, status, error){
				 	$('#dialogCustomer').html(status+'('+error+')'+': '+ referral.responseText );
					}",
			
            ))?>;
    return false; 
 
}
</script>
