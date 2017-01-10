<?php

class ReferralController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
		return array('rights');
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		
		$referral = RestController::getViewData('referrals', $id);
		
		$agencies = RestController::getCustomData('referrals/agency?id=', $id);
		
		$modelStatus = New Referralstatus;
		$modelStatus->setAttributes($referral['referralstatus'][0], true);
		$modelStatus->id = $referral['referralstatus'][0]['id'];
		
		$this->render('view',array(
			'model'=>$model,
			'referral'=>$referral,
			'samples'=>new CArrayDataProvider((count($referral['samples']) == 0 ? array() : $referral['samples']),
						array('pagination'=>$pagination)
					),
				
			'analyses'=>new CArrayDataProvider((count($referral['analyses']) == 0 ? array() : $referral['analyses']), 
						array('pagination'=>$pagination)
					),
			'matchingAgencies'=>new CArrayDataProvider((count($agencies) == 0) ? array() : $agencies, 
						array('pagination'=>$pagination)
					),
			'modelStatus'=>$modelStatus,
			'results'=>new CArrayDataProvider((count($referral['results']) == 0 ? array() : $referral['results']), 
						array('pagination'=>$pagination)
					),
			'acceptingAgencyLookup'=>$agencies,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Referral;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Referral']))
		{
			$model->attributes=$_POST['Referral'];
			$model->receivingAgencyId =  Yii::app()->Controller->getRstlId();
			
			if($model->validate())
			{
				$postFields = "referralDate=".$_POST['Referral']['referralDate']
					."&receivingAgencyId=".$model->receivingAgencyId
					."&lab_id=".$_POST['Referral']['lab_id']
					."&customer_id=".$_POST['Referral']['customer_id']
					."&paymentType_id=".$_POST['Referral']['paymentType_id']
					."&discount_id=".$_POST['Referral']['discount_id']
					."&reportDue=".$_POST['Referral']['reportDue']
					."&conforme=".$_POST['Referral']['conforme']
					."&receivedBy=".$_POST['Referral']['receivedBy'];
				
				$referral = RestController::postData('referrals', $postFields);
				
				if(isset($referral["id"])){
					$this->redirect(array('view','id'=>$referral["id"]));                	
               	}else{
					Yii::app()->user->setFlash('error','The Referral was not successfully saved or updated.');
					Yii::app()->user->setFlash('errormessage', $referral[0]['message']);
    				$this->refresh();
               	}
			}
		}

		$model->receivingAgencyId = Yii::app()->Controller->getRstlId();
		$model->paymentType_id = 1;
			
		$this->render('create',array(
			'model'=>$model, 
			'labs' => Lab::listData(), 
			'agencies' => Agency::listData(),
			'discounts'=> Discount::listData()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Referral']))
		{
			$model->attributes=$_POST['Referral'];
			if($model->validate())
			{
				$postFields = "referralDate=".$_POST['Referral']['referralDate']
					."&receivingAgencyId=".$model->receivingAgencyId
					."&lab_id=".$_POST['Referral']['lab_id']
					."&customer_id=".$_POST['Referral']['customer_id']
					."&paymentType_id=".$_POST['Referral']['paymentType_id']
					."&discount_id=".$_POST['Referral']['discount_id']
					."&reportDue=".$_POST['Referral']['reportDue']
					."&conforme=".$_POST['Referral']['conforme']
					."&receivedBy=".$_POST['Referral']['receivedBy']
					."&status=".$_POST['Referral']['status'];
				
				$referral = RestController::putData('referrals', $postFields, $id);
				
				$this->redirect(array('view','id'=>$id));			
			}
		}

		$this->render('update',array(
				'model'=>$model, 
				'labs' => Lab::listData(), 
				'agencies' => Agency::listData(),
				'discounts'=> Discount::listData()
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Referral');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//$referrals = RestController::getAdminData('consolidatedreferrals');
		$referrals = RestController::getAdminData('referrals');
		$results = $this->segregateResults($referrals);
		
		$this->render('admin',array(
			'model'=>$model,
			'referralIn'=>new CArrayDataProvider((count($results['referralIn']) == 0) ? array() : $results['referralIn'], 
				array('pagination'=>$pagination)
			),
			'referralOut'=>new CArrayDataProvider((count($results['referralOut']) == 0) ? array() : $results['referralOut'], 
						array('pagination'=>$pagination)
					),
			'referrals'=>$referrals,
			'newReferrals'=>Referral::countNewReferrals()
		));
	}

	function segregateResults($referrals)
	{
		$agencyId = Yii::app()->Controller->getRstlId();
		
		$results = array(
			'referralOut' => array(),
			'referralIn' => array(), 
		);
		
		foreach($referrals as $referral)
		{
				if($referral['acceptingAgencyId'] == $agencyId){
					array_push($results['referralIn'], $referral);
				}
				if($referral['receivingAgencyId'] == $agencyId){
					array_push($results['referralOut'], $referral);
				}	
		}
		return $results;
	}
	
	public function actionValidateReferral()
	{
		if(isset($_POST['id'])){
			$referralId = $_POST['id'];
		}
		if(isset($_POST['Referral']['referralId'])){
			$referralId = $_POST['Referral']['referralId'];
		}
		
		$model=$this->loadModel($referralId);
		
		if(isset($_POST['Referral']))
		{
			$authenticateTechnicalManager = Users::validateTechnicalManager($_POST['Referral']['technicalManager'], $_POST['Referral']['managerPassword']);
			
			if($authenticateTechnicalManager){
				$referral = RestController::getCustomData('referrals/validate?id=', $referralId);
				if(isset($referral)){
					echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>'Referral Validated'
                        ));
                	exit;                	
               	}else{
					Yii::app()->user->setFlash('error','Validation error!');
					Yii::app()->user->setFlash('errormessage', $referral);
    				echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_validateReferral', 
									array(
										'model'=>$model,
										'referralId'=>$_POST['Referral']['referralId'],
										'message'
									), true, true)
					));
	                exit;
               	}
			}else{
				Yii::app()->user->setFlash('error','Authentication unsuccessful!');
				Yii::app()->user->setFlash('errormessage', 'Password does not match with the selected Technical Manager.');
				echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_validateReferral', 
									array(
										'model'=>$model,
										'referralId'=>$_POST['Referral']['referralId'],
									), true, true)
				));
                exit;
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
        {
			echo CJSON::encode(array(
                'status'=>'failure',
                'div'=>$this->renderPartial('_validateReferral', 
						array(
							'model'=>$model,
							'referralId'=>$referralId,
				), true, true)));
            exit;               
        }
	}
	
	public function actionSearchAgency()
	{
		$results = RestController::getCustomData('referrals/agency?id=', $_POST['id']);
				
		return $results;
	}
	
	public function actionNotifyAgency()
	{
		$postFields = "type_id=1"
					."&sender_id=".Yii::app()->Controller->getRstlId()
					."&recipient_id=".$_POST['recipient_id']
					."&controller=referral"
					."&action=view"
					."&resource_id=".$_POST['resource_id']
					."&read=0";
					
				
		$notify = RestController::postData('notifications', $postFields);
		return $notify;		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax']))
			//$this->redirect($_POST['returnUrl']);
	}
	
	public function actionMarkread()
	{
		$notification = RestController::getCustomData('notifications/markread?id=', $_POST['resource_id']);
		return $notification;
	}
	
	public function actionSend($id=NULL)
	{
		//$model=$this->loadModel($_POST['referral_id']);

		if(isset($_POST['Referral']['id'])){
			$id = $_POST['Referral']['id'];
		}else{
			if(isset($_POST['referral_id']))
				$id = $_POST['referral_id'];
		}	
			
		$model=$this->loadModel($id);
		
		if(isset($_POST['Referral']))
		{
			
			$ch = curl_init();
					
			$url = 'http://'.Yii::app()->Controller->getServer().'/referrals/'.$id;
			
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			
			//Update data
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS,
				"status=".$_POST['Referral']['status']
				."&acceptingAgencyId=".$_POST['Referral']['acceptingAgencyId']
			);
			
			$data = curl_exec($ch);
			curl_close($ch);
			
			$json = json_decode($data, true);
			
			if (Yii::app()->request->isAjaxRequest)
				{
					echo CJSON::encode(array(
                        'status'=>'success', 
                        'div'=>"Referral successfully sent"
                        ));
                      
                    exit;    
				}
				else
					$this->redirect(array('view','id'=>$model->id));
		}
		if (Yii::app()->request->isAjaxRequest)
        {
			echo CJSON::encode(array(
                'status'=>'failure',
                'div'=>$this->renderPartial('_sendReferral', 
						array(
							'model'=>$model,
							'referralId'=>$referralId,
							//'referral'=>$referral,
				), true, true)));
			
            exit;               
        }
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Referral the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$referral = RestController::getViewData('referrals', $id);
		
		$model = New Referral;
		$model->setAttributes($referral, true);
		$model->id = $id;
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Referral $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='referral-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionUploadResult()
	{
		$model = New Result;
		
		$model->attributes=$_POST['Result'];
		
		$uploadFile = CUploadedFile::getInstance($model,'uploadFile');

		$cfile = new CURLFile($uploadFile->tempName, $uploadFile->type, $uploadFile->name);
				
		$postFields = array(
					'referral_id' => $_POST['Result']['referral_id'],
					'filename' => $uploadFile->name, 
					'file' => $cfile
		);
					
		$referral = RestController::postData('results', $postFields);
		
		$this->redirect(array('view','id'=>$_POST['Result']['referral_id']));
	}
}
