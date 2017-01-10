<div style="position:relative">
<?php
/* @var $this RequestController */
/* @var $model Request */

//if($model->cancelled)
	//$this->renderPartial('_cancelled',array('model'=>$model->cancelDetails));

$this->menu=array(
	array('label'=>'Create Referral', 'url'=>array('create')),
	//array('label'=>'Update Request', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Referral', 'url'=>array('admin')),
);  
?>
<h1>View Referral: <?php //echo $referral['referralCode']; ?><small>
<?php //echo $model->cancelled ? '' : (Yii::app()->getModule('lab')->isLabAdmin() ? $linkCancelWithReason : '');?>
</small>
</h1>
<?php 
	//print_r($samps);
	$this->widget('ext.widgets.DetailView4Col', array(
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'detail-view table table-striped table-condensed'),
	'data'=>$referral,
	'attributes'=>array(
		//'id',
		//'receivingLabId',
		array(
			'name'=>'Receiving Lab',
			'type'=>'raw',
			'value'=>Yii::app()->Controller->getLabName($referral['receivingLabId'])
		),
		array(
			'name'=>'Accepting Lab',
			'type'=>'raw',
			'value'=>Yii::app()->Controller->getLabName($referral['acceptingLabId'])
		),
		//'clientId',
		array(
			'name'=>'Customer',
			'type'=>'raw',
			'value'=>$referral['clientName']
		),
		//'status'
		array(
			'name'=>'Referral Status',
			'type'=>'raw',
			'value'=>CHtml::link($referral['status'], '', array('style'=>'cursor:pointer;', 'onClick'=>'updateReferral(4); $("#dialogReferral").dialog("open")')),
				//'onClick'=>'js:{addTest('.$referral['acceptingLabId'].', '.$_GET['id'].'); $("#dialogTest").dialog("open");}',
				//'class'=>'btn btn-info btn-small',
				
			/*'value'=>CHtml::dropDownList('id', '', 
                CHtml::listData(array('0'=>array('id'=>1, 'value'=>'hahaha')), 'id', 'value'),
                array(
                    'submit'=>('Site/Index'),
                    // 'onchange'=>'js:something'.  // You can trigger some javascript here instead of the submit - but it's more hassle if you ask me.
                    'prompt'=>'-- You\'ll need a prompt' // Because onchange wont fire for the initially selected item.
                )
            )*/
		),
	),
));
//echo '<pre>';
//print_r($refs);
//echo '</pre>';
?>

<?php	/*$linkSample = Chtml::link('<span class="icon-white icon-plus-sign"></span> Add Sample', '', array( 
			'style'=>'cursor:pointer;',
			'class'=>'btn btn-info btn-small',
			'onClick'=>'js:{addSample(); $("#dialogSample").dialog("open");}',
			));*/
		//echo $linkSample;
?>
<h4>Samples</h4>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    	'id'=>'sample-grid',
	    'summaryText'=>false,
		'emptyText'=>'No samples.',
		//'htmlOptions'=>array('class'=>'grid-view padding0 paddingLeftRight10'),
        //'rowCssClassExpression'=>'$data->status',
		'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
		'rowHtmlOptionsExpression' => 'array("title" => "Click to update", "class"=>"link-hand")', 
        //It is important to note, that if the Table/Model Primary Key is not "id" you have to
        //define the CArrayDataProvider's "keyField" with the Primary Key label of that Table/Model.
        'dataProvider' => $samples,
        'columns' => array(
    		/*array(
				'name'=>'sampleID',
				'header'=>'',
				'type'=>'raw',
				'value'=>$data["sampleID"]
			),
			array(
				'name'=>'id',
				'header'=>'Sample ID',
				'type'=>'raw',
				'value'=>$data["desciption"]
			),*/
    		array(
				'name'=>'desciption',
				'header'=>'Sample',
				'type'=>'raw',
				'value'=>$data["desciption"]
			),
    		/*array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{delete}'
			)*/
			array(
				'name'=>'Delete',
				'type'=>'raw',
				'value'=>'Chtml::link("X",Yii::app()->Controller->createUrl("sample/delete",array("id"=>$data["id"])))',
				'htmlOptions'=>array('title'=>'Delete', 'style'=>'width: 100px; text-align: center; font-weight:bold;')
			),
        )
    ));
    /*$this->widget('zii.widgets.grid.CGridView', array(
    	'id'=>'sample-grid',
	    'summaryText'=>false,
		'emptyText'=>'No samples.',
		//'htmlOptions'=>array('class'=>'grid-view padding0 paddingLeftRight10'),
        //'rowCssClassExpression'=>'$data->status',
		'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
		'rowHtmlOptionsExpression' => 'array("title" => "Click to update", "class"=>"link-hand")', 
        //It is important to note, that if the Table/Model Primary Key is not "id" you have to
        //define the CArrayDataProvider's "keyField" with the Primary Key label of that Table/Model.
        'dataProvider' => $samples,
        'columns' => array(
    		array(
				'name'=>'sampleID',
				'header'=>'',
				'type'=>'raw',
				'value'=>$data["sampleID"]
			),
    		array(
				'name'=>'desciption',
				'header'=>'Sample',
				'type'=>'raw',
				'value'=>$data["desciption"]
			),
			array(
				'name'=>'testName',
				'header'=>'Test Conducted',
				'type'=>'raw',
				'value'=>$data["testName"]
			),
			array(
				'name'=>'fee',
				'header'=>'Fee',
				'type'=>'raw',
				'value'=>$data["fee"]
			),
			
    		array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{delete}'
			)
        )
    ));*/
    ?>
<h4>Tests</h4>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
    	'id'=>'test-grid',
	    'summaryText'=>false,
		'emptyText'=>'No analyses.',
		//'htmlOptions'=>array('class'=>'grid-view padding0 paddingLeftRight10'),
		'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
		'rowHtmlOptionsExpression' => 'array("title" => "Click to update", "class"=>"link-hand")', 
        //It is important to note, that if the Table/Model Primary Key is not "id" you have to
        //define the CArrayDataProvider's "keyField" with the Primary Key label of that Table/Model.
        'dataProvider' => $tests,
        'columns' => array(
    		//'id',
    		array(
				'name'=>'desciption',
				'header'=>'Sample',
				'type'=>'raw',
				'value'=>$data["desciption"]
			),
			array(
				'name'=>'testName',
				'header'=>'Test Conducted',
				'type'=>'raw',
				'value'=>$data["testName"]
			),
			array(
				'name'=>'fee',
				'header'=>'Fee',
				'type'=>'raw',
				'value'=>$data["fee"]
			),
			array(
				'name'=>'Delete',
				'type'=>'raw',
			     
			
				//'value'=>"CHtml::link('X','#',array('submit'=>array('testconducted/delete','id'=>1),'confirm' => 'Are you sure you want to delete ".$data['testId']."?'))",
				'value'=>'Chtml::link("X",Yii::app()->Controller->createUrl("testconducted/delete",array("id"=>$data["testId"]), array("confirm"=>"jajajaj")))',
				'htmlOptions'=>array('title'=>'Delete', 'style'=>'width: 100px; text-align: center; font-weight:bold;')
			),
    		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
						'deleteConfirmation'=>"js:'Do you really want to delete sample: '+$.trim($(this).parent().parent().children(':nth-child(2)').text())+'?'",
						'template'=>'{delete}',	
						'buttons'=>array
						(
							'delete' => array(
								'label'=>'Delete Sample',
								'url'=>'Yii::app()->createUrl("ref/sample/delete/id/)',
								),
						),
			)*/
    		
        ),
    ));
    ?>
<?php
	$linkSample = Chtml::link('<span class="icon-white icon-plus-sign"></span> Add Sample', '', array( 
			'style'=>'cursor:pointer;',
			'class'=>'btn btn-info btn-small',
			'onClick'=>'js:{addSample('.$_GET["id"].'); $("#dialogSample").dialog("open");}',
			//'disabled'=>$model->cancelled
			));
	 
	$linkTest = Chtml::link('<span class="icon-white icon-plus-sign"></span> Add Test', '', array( 
			'style'=>'cursor:pointer;',
			'onClick'=>'js:{addTest('.$referral["acceptingLabId"].', '.$_GET["id"].'); $("#dialogTest").dialog("open");}',
			'class'=>'btn btn-info btn-small',
			));
			
	echo $linkSample.'&nbsp;&nbsp;&nbsp;'.$linkTest;
?>

<!-- Referral Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogReferral',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Referral',
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
<!-- Referral Dialog : End -->   

<!-- Sample Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogSample',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Sample',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>300,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Sample Dialog : End -->    

<!-- Test Dialog : Start -->
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		    'id'=>'dialogTest',
		    // additional javascript options for the dialog plugin
		    'options'=>array(
		        'title'=>'Test',
				'show'=>'scale',
				'hide'=>'scale',				
				'width'=>250,
				'modal'=>true,
				'resizable'=>false,
				'autoOpen'=>false,
			    ),
		));

	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- Test Dialog : End -->

<script type="text/javascript">
function addSample(referralId)
{
    <?php 
    		echo CHtml::ajax(array(
			'url'=>$this->createUrl('sample/create'),
			'data'=> "js:$(this).serialize()+ '&referralId='+referralId",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogSample').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogSample form').submit(addSample);
                }
                else
                {
                    $.fn.yiiGridView.update('sample-grid');
					$('#dialogSample').html(data.div);
                    setTimeout(\"$('#dialogSample').dialog('close') \",1000);
					
                }
 
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogSample").html(
						\'<div class="loader">'.$image.'<br\><br\>Generating form.<br\> Please wait...</div>\'
					);
             }',
			 'error'=>"function(request, status, error){
				 	$('#dialogSample').html(status+'('+error+')'+': '+ request.responseText );
					}",
			
            ))?>;
    return false; 
}

function updateSample(id)
{
	<?php 
	echo CHtml::ajax(array(
			'url'=>$this->createUrl('sample/update'),
			'data'=> "js:$(this).serialize()+ '&id='+id",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogSample').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogSample form').submit(updateSample);
                }
                else
                {
                    $.fn.yiiGridView.update('sample-grid');
                    $.fn.yiiGridView.update('analysis-grid');
					$('#dialogSample').html(data.div);
                    setTimeout(\"$('#dialogSample').dialog('close') \",1000);
                }
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogSample").html(
						\'<div class="loader">'.$image.'<br\><br\>Retrieving record.<br\> Please wait...</div>\'
					);
            }',
			 'error'=>"function(request, status, error){
				 	$('#dialogSample').html(status+'('+error+')'+': '+ request.responseText+ ' {'+error.code+'}' );
					}",
            ))?>;
    return false; 
}

function addTest(acceptingLabId, referralId)
{
    <?php echo CHtml::ajax(array(
			'url'=>$this->createUrl('testconducted/create', array('acceptingLabId'=>$acceptingLabId, 'referralId'=>$referralId)),
			'data'=> "js:$(this).serialize()+ '&acceptingLabId='+acceptingLabId+ '&referralId='+referralId",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogTest').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogTest form').submit(addTest);
                }
                else
                {
                    $.fn.yiiGridView.update('test-grid');
					$('#dialogTest').html(data.div);
                    setTimeout(\"$('#dialogTest').dialog('close') \",1000);
					
                }
 
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogTest").html(
						\'<div class="loader">'.$image.'<br\><br\>Generating form.<br\> Please wait...</div>\'
					);
             }',
			 'error'=>"function(request, status, error){
				 	$('#dialogTest').html(status+'('+error+')'+': '+ request.responseText );
					}",
			
            ))?>;
    return false; 
}

function updateAnalysis(id)
{
	<?php 
	echo CHtml::ajax(array(
			'url'=>$this->createUrl('analysis/update',array('id'=>4)),
			'data'=> "js:$(this).serialize()+ '&id='+id",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogReferral').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogReferral form').submit(updateReferral);
                }
                else
                {
                    //$.fn.yiiGridView.update('analysis-grid');
					$('#dialogReferral').html(data.div);
                    setTimeout(\"$('#dialogReferral').dialog('close') \",1000);
                }
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogReferral").html(
						\'<div class="loader">'.$image.'<br\><br\>Retrieving record.<br\> Please wait...</div>\'
					);
            }',
			 'error'=>"function(request, status, error){
				 	$('#dialogReferral').html(status+'('+error+')'+': '+ request.responseText+ ' {'+error.code+'}' );
					}",
            ))?>;
    return false; 
 
}

function updateReferral(id)
{
	<?php 
	echo CHtml::ajax(array(
			'url'=>$this->createUrl('referral/update'),
			'data'=> "js:$(this).serialize()+ '&id='+id",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogReferral').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogReferral form').submit(updateReferral);
                }
                else
                {
                    //$.fn.yiiGridView.update('sample-grid');
                    //$.fn.yiiGridView.update('analysis-grid');
					$('#dialogReferral').html(data.div);
                    setTimeout(\"$('#dialogReferral').dialog('close') \",1000);
                }
            }",
			'beforeSend'=>'function(jqXHR, settings){
                    $("#dialogReferral").html(
						\'<div class="loader">'.$image.'<br\><br\>Retrieving record.<br\> Please wait...</div>\'
					);
            }',
			 'error'=>"function(request, status, error){
				 	$('#dialogReferral').html(status+'('+error+')'+': '+ request.responseText+ ' {'+error.code+'}' );
					}",
            ))?>;
    return false; 
}
</script>