<?php
class PlacementController extends Controller
{
    
	public function init() {
        parent::init();
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        if($ip != '217.64.18.253'){
            $this->redirect('http://barattson.com/', TRUE, 302);
        }
    }
    
    public $pageTitle = 'Placement Test | Barattson';
    
    public $pageUrl = 'http://barattson.com/payment/placement/create';
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column3';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('create','update','method','online','cash','invoice','confirm','success', 'print', 'printview', 'printonline', 'order'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','index','view'),
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
	    //$this->layout='column2';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionPrint($id)
	{
	    $this->layout='columnprint';
		$this->render('print',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionPrintview($id)
	{
	    $this->layout='columnprint';
		$this->render('printview',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionPrintonline($id)
	{
	    $this->layout='columnprint';
		$this->render('printonline',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionMethod($id)
	{
	    if(!isset(Yii::app()->session['formid'])){
	        $this->render('sessionerror');
	    }else{
            $this->render('method',array(
                'model'=>$this->loadModel(Yii::app()->session['formid']),
            ));
		}
	}
	
	public function actionOnline()
	{
	    if(isset(Yii::app()->session['formid'])){
	        $model = $this->loadModel(Yii::app()->session['formid']);
	        if($model->status == 0){
                $mid = 'barattson';
                $amount = $model->amount.'00';
                $currency = 944;
                $description = $model->name.'_'.$model->surname.'-CBE';
                $reference = uniqid('REF').Yii::app()->session['formid'];
                $language = 'az';
                $key='1122WEJGHSDGSJHGSDGQIYWOXVVASGIQ';
                
                $signature = strtoupper(md5(strlen($mid).$mid.strlen($amount).$amount.strlen($currency).$currency.(!empty($description)? strlen($description).$description :"0").strlen($reference).$reference.strlen($language).$language.$key));
                
                //echo 'http://test.millikart.az:8513/gateway/payment/register?mid='.$mid.'&amount='.$amount.'&currency='.$currency.'&description='.$description.'&reference='.$reference.'&language='.$language.'&signature='.$signature;
                $xmlObj = (simplexml_load_file('https://pay.millikart.az/gateway/payment/register?mid='.$mid.'&amount='.$amount.'&currency='.$currency.'&description='.$description.'&reference='.$reference.'&language='.$language.'&signature='.$signature));
                //print_r($xmlObj);
                if(isset($xmlObj->redirect)){
                    $this->redirect($xmlObj->redirect, TRUE, 301);
                }else{
                    $this->render('online');
                }
            }else{
                if(isset(Yii::app()->session['formid'])) unset(Yii::app()->session['formid']);
                $this->render('sessionerror');
            }
	    }else{
	        if(isset(Yii::app()->session['formid'])) unset(Yii::app()->session['formid']);
	        $this->render('sessionerror');
	    }
	}
	
	public function actionSuccess()
	{
	    if(isset($_GET['reference'])){
	        $suffix = substr($_GET['reference'], 0, 3);
	        if($suffix == 'REF'){
                if(isset(Yii::app()->session['formid'])){
                    $model = $this->loadModel(substr($_GET['reference'], 16));
                    if($model->status == 0){
                        $model->status = 1;
                        $model->reference = $_GET['reference'];
                        if($model->save()){
                            
                            $filepname = $this->getPdfName($model->id, 'invoice_', 'printonline');
                            $filepname2 = $this->getPdfName($model->id, 'detail_', 'printview');
                            
                            $model->pdf_invoice = $filepname;
                            $model->pdf_view = $filepname2;
                            $model->save();
                            
                            MailSender::Send($model->email,'Exam registration confirm','<div class="confirmtext"><strong>Dear Candidate!</strong><br><br>We thank You for Your Completion of Registration process.<br><br>We wish you success on your exam and hope you will pass to new level in your life.<br><br><a href="http://barattson.com/pdf/'.$filepname.'">Download the invoice</a><br><br>Sincerely Your,<br><strong>Barattson</strong></div>', 'noreply');
                            MailSender::Send(Yii::app()->params['clientMail'], $model->name.' '.$model->surname.' / ONLINE / CBE', 'Hi,<br/><br/>Customers to register for the exam.<br/><br/>In the attached file contains more detailed data', 'noreply', $filepname2, $filepname);
                    
                            unset(Yii::app()->session['formid']);
                            $this->render('confirm');
                            
                        }else{
                            $this->render('errorconfirm');
                        }
                    }
                }else{
                    $this->render('sessionerror');
                }
	        }else if($suffix == 'PAY'){
	            if(isset(Yii::app()->session['payid'])){
                    $model = $this->loadPayModel(substr($_GET['reference'], 16));
                    if($model->reference == 'Empty'){
                        $model->reference = $_GET['reference'];
                        if($model->save()){
                            unset(Yii::app()->session['payid']);
                            MailSender::Send($model->email,'Barattson Online Payment','<div class="confirmtext"><strong>Dear '.$model->name.'!</strong><br><br>We thank You for Your Completion of Payment process.<br/><br/>Payment Transaction ID: <strong>'.strtoupper($model->reference).'</strong><br/><br/>Sincerely Your,<br/><strong>Barattson</strong></div>', 'noreply');
                            $this->render('payonlineconfirm');
                        }else{
                            $this->render('sessionerror');
                        }
                    }
                }else{
                    $this->render('sessionerror');
                }
	        }
	    }
	}
	
	public function actionCash($id)
	{
	    if(!isset(Yii::app()->session['formid'])){
	        $this->render('sessionerror');
	    }else{
            $this->render('cash',array(
                'model'=>$this->loadModel(Yii::app()->session['formid']),
            ));
		}
	}
	
	public function actionInvoice($id)
	{
	    if(!isset(Yii::app()->session['formid'])){
	        $this->render('sessionerror');
	    }else{
            $this->render('invoice',array(
                'model'=>$this->loadModel(Yii::app()->session['formid']),
            ));
		}
	}
	
	public function actionOrder()
	{
	    if(!isset(Yii::app()->session['formid'])){
	        $this->render('sessionerror');
	    }else{
            $this->render('order',array(
                'model'=>$this->loadModel(Yii::app()->session['formid']),
            ));
		}
	}
	
	private function getPdfName($id, $suffix='invoice_', $print="print"){
	    $html = file_get_contents('http://barattson.com/payment/registration/'.$print.'/'.$id);
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($html);
        $filepname = uniqid($suffix).$id.'.pdf';
        $filepath = '/var/www/barattson/pdf/'.$filepname;
        $html2pdf->Output($filepath, "F");
        return $filepname;
	}
	
	public function actionConfirm($id)
	{
	    if(isset(Yii::app()->session['formid'])){
	        $model = $this->loadModel(Yii::app()->session['formid']);
	        if($model->status == 0){
	            $model->status = 2;
	            if($model->save()){
                    
                    $filepname = $this->getPdfName($model->id, 'invoice_', 'print');
                    $filepname2 = $this->getPdfName($model->id, 'detail_', 'printview');
                    
                    $model->pdf_invoice = $filepname;
                    $model->pdf_view = $filepname2;
                    $model->save();
                    MailSender::Send($model->email,'Exam registration confirm','<div class="confirmtext"><strong>Dear Candidate!</strong><br><br>We thank You for Your Completion of Registration process.<br><br>We wish you success on your exam and hope you will pass to new level in your life.<br><br><a href="http://barattson.com/pdf/'.$filepname.'">Download the invoice</a><br><br>Sincerely Your,<br><strong>Barattson</strong></div>', 'noreply');
                    MailSender::Send(Yii::app()->params['clientMail'], $model->name.' '.$model->surname.' / CASH / CBE', 'Hi,<br/><br/>Customers to register for the exam.<br/><br/>In the attached file contains more detailed data', 'noreply', $filepname2, $filepname);
                    
                    unset(Yii::app()->session['formid']);
                    $this->render('confirm',array(
                        'model'=>$model,
                    ));
	            }
	        }
	    }else{
	        $this->render('sessionerror');
	    }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	    if(Yii::app()->user->isGuest)
            if(isset(Yii::app()->session['formid'])){
                $this->redirect(array('update','id'=>Yii::app()->session['formid']));
            }
		$model=new Place;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Place']))
		{
			$model->attributes=$_POST['Place'];
			
			$model->image = CUploadedFile::getInstance($model,'image');
			if( ($model->fab==0) && ($model->fma==0) && ($model->ffa==0) && ($model->glo==0) && ($model->eng==0) && ($model->fa_one==0) && ($model->ma_one==0) && ($model->fa_two==0) && ($model->ma_two==0) )
			    $model->fab = '';
			
            $model->created = date('Y-m-d H:i:s', time());
            
            $model->gepl_date = $this->getSaveDate($model->gepl_date);
            $model->fmpl_date = $this->getSaveDate($model->fmpl_date);
            $model->iltpl_date = $this->getSaveDate($model->iltpl_date);
            
		
			$model->status=0;
			$model->amount = $this->getAmount($model);
			$model->imgpath = 'nese';
			if($model->validate()){
			    $model->date = $this->getSaveDate($model->date, true);
			    $path='';
			    if($model->image !== null){
                    $path='/upload/'.uniqid().$model->image->getName();
                    $model->image->saveAs(Yii::getPathOfAlias('webroot').$path);
			    }
			    if($path !== ''){
			        $model->imgpath = $path;
			    }else{
			        $model->imgpath = '';
			    }
			    if($model->save()){
                    Yii::app()->session['formid'] = $model->id;
                    $this->redirect(array('method','id'=>$model->id));
				}
			}
			
			
            
            $model->gepl_date = date('d-m-Y / H:i', strtotime($model->gepl_date));
            $model->fmpl_date = date('d-m-Y / H:i', strtotime($model->fmpl_date));
            $model->iltpl_date = date('d-m-Y / H:i', strtotime($model->iltpl_date));
            
		}

		if(!isset($model->gepl_date)) $model->gepl_date = date('d-m-Y / 00:00', time());
		if(!isset($model->fmpl_date)) $model->fmpl_date = date('d-m-Y / 00:00', time());
		if(!isset($model->iltpl_date)) $model->iltpl_date = date('d-m-Y / 00:00', time());
		
		$this->render('create',array(
			'model'=>$model,
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
		
		if(Yii::app()->user->isGuest){
            if($model->status != 0){
                if(isset(Yii::app()->session['formid'])) unset(Yii::app()->session['formid']);
                $this->redirect(array('create'));
            }else{
                if(isset(Yii::app()->session['formid'])){
                    if((Yii::app()->session['formid']*1) != $model->id){
                        if(isset(Yii::app()->session['formid'])) unset(Yii::app()->session['formid']);
                        $this->redirect(array('create'));
                    }
                }else{
                    if(isset(Yii::app()->session['formid'])) unset(Yii::app()->session['formid']);
                    $this->redirect(array('create'));
                }
            }
        }else{
            $this->layout='column2';
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registr']))
		{
			$model->attributes=$_POST['Registr'];
			if(Yii::app()->user->isGuest) $model->status=0; // dont hack
			
			if( ($model->fab==0) && ($model->fma==0) && ($model->ffa==0) && ($model->glo==0) && ($model->eng==0) && ($model->fa_one==0) && ($model->ma_one==0) && ($model->fa_two==0) && ($model->ma_two==0) ){
			    $model->fab = '';
			}
			$model->created = date('Y-m-d H:i:s', time());
			
			$model->image = CUploadedFile::getInstance($model,'image');
			
			
            $model->date = $this->getSaveDate($model->date, true);
            
            $model->fab_date = $this->getSaveDate($model->fab_date);
            $model->fma_date = $this->getSaveDate($model->fma_date);
            $model->ffa_date = $this->getSaveDate($model->ffa_date);
            $model->glo_date = $this->getSaveDate($model->glo_date);
            $model->eng_date = $this->getSaveDate($model->eng_date);
            $model->fa_one_date = $this->getSaveDate($model->fa_one_date);
            $model->ma_one_date = $this->getSaveDate($model->ma_one_date);
            $model->fa_two_date = $this->getSaveDate($model->fa_two_date);
            $model->ma_two_date = $this->getSaveDate($model->ma_two_date);
            
			$model->amount = $this->getAmount($model);
			
			if($model->validate()){
			    $path = $model->imgpath;
			    if($model->image !== null){
                    $path='/upload/'.uniqid().$model->image->getName();
                    $model->image->saveAs(Yii::getPathOfAlias('webroot').$path);
			    }
			    
			    $model->imgpath = $path;
			    if($model->save()){
                    Yii::app()->session['formid'] = $model->id;
                    if(Yii::app()->user->isGuest){
                        $this->redirect(array('method','id'=>$model->id));
                    }else{
                        $filepname = $this->getPdfName($model->id, 'invoice_', 'print');
                        $filepname2 = $this->getPdfName($model->id, 'detail_', 'printview');
                        
                        $model->pdf_invoice = $filepname;
                        $model->pdf_view = $filepname2;
                        $model->save();
                        $this->redirect(array('view','id'=>$model->id));
                    }
				}
			}
		}
		
		$model->date = $this->getDate($model->date, true);
		$model->fab_date = $this->getDate($model->fab_date);
		$model->fma_date = $this->getDate($model->fma_date);
		$model->ffa_date = $this->getDate($model->ffa_date);
		$model->glo_date = $this->getDate($model->glo_date);
		$model->eng_date = $this->getDate($model->eng_date);
		$model->fa_one_date = $this->getDate($model->fa_one_date);
		$model->ma_one_date = $this->getDate($model->ma_one_date);
		$model->fa_two_date = $this->getDate($model->fa_two_date);
		$model->ma_two_date = $this->getDate($model->ma_two_date);
		
		

		$this->render('update',array(
			'model'=>$model,
		));
	}

	private function getAmount($model){
	    $price1 = 165;
	    $price2 = 130;
	    $amount = 0;
	    $today = strtotime(date('Y-m-d 00:00:00', time()))+60*60*24*31;
	    if($model->fab == 1){
	        /*$date = strtotime($model->fab_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->fma == 1){
	        /*$date = strtotime($model->fma_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->ffa == 1){
	        /*$date = strtotime($model->ffa_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->glo == 1){
	        /*$date = strtotime($model->glo_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price1;
	    }
	    if($model->eng == 1){
	        /*$date = strtotime($model->eng_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price1;
	    }
	    if($model->fa_one == 1){
	        /*$date = strtotime($model->fa_one_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->ma_one == 1){
	        /*$date = strtotime($model->ma_one_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->fa_two == 1){
	        /*$date = strtotime($model->fa_two_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    if($model->ma_two == 1){
	        /*$date = strtotime($model->ma_two_date);
	        if($today > $date) $amount += $price1; else $amount += $price2;*/
	        $amount += $price2;
	    }
	    return $amount;
	}
	private function getDate($date, $isBirth = false){
	    if(isset($date)){
            $date = explode(" ", $date);
            if(!$isBirth){
                $cal = explode("-", $date[0]);
                $tm = explode(":", $date[1]);
                $date = $cal[2].'-'.$cal[1].'-'.$cal[0].' / '.$tm[0].':'.$tm[1];
            }else{
                $cal = explode("-", $date[0]);
                $date = $cal[2].'-'.$cal[1].'-'.$cal[0];
            }
	    }else{
	        $date = date("d-m-Y H:i", time());
	    }
	    return $date;
	}
	
	private function getSaveDate($date, $isBirth = false){
	    
	    if(isset($date) && !empty($date) ){
	        
            $date = explode(" / ", $date);
            if(!$isBirth){
                $cal = explode("-", $date[0]);
                $tm = $date[1];
                $date = $cal[2].'-'.$cal[1].'-'.$cal[0].' '.$tm.':00';
            }else{
                $cal = explode("-", $date[0]);
                $date = $cal[2].'-'.$cal[1].'-'.$cal[0].' 00:00:00';
            }
	    }else{
	        $date = date("Y-m-d H:i:s", time());
	    }
	    return $date;
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Registr');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	    $this->layout='column2';
		$model=new Registr('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registr']))
			$model->attributes=$_GET['Registr'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Registr the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Registr::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadPayModel($id)
	{
		$model=Payonline::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Registr $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='registr-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
