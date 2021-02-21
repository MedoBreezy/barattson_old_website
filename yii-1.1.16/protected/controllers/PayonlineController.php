<?php

class PayonlineController extends Controller
{
    public $pageTitle = 'Online Payment | Barattson';
    public $pageUrl = 'http://barattson.com/payment/payonline/create';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column4';

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
				'actions'=>array('create','update','view','online'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionOnline()
	{
		if(isset(Yii::app()->session['payid'])){
	        $model = $this->loadModel(Yii::app()->session['payid']);
	        if(isset($model->reference)){
                $mid = 'barattson';
                $amount = $model->amount.'00';
                $currency = 944;
                if(isset(Yii::app()->params['currency'][$model->currency.''])) 
                    $currency = $model->currency;
                else{
                    $this->render('erroronline');
                    return;
                }
                $description = $model->name.'-PAY';
                $reference = uniqid('PAY').Yii::app()->session['payid'];
                $language = 'az';
                $key='1122WEJGHSDGSJHGSDGQIYWOXVVASGIQ';
                
                $signature = strtoupper(md5(strlen($mid).$mid.strlen($amount).$amount.strlen($currency).$currency.(!empty($description)? strlen($description).$description :"0").strlen($reference).$reference.strlen($language).$language.$key));
                
                //echo 'http://test.millikart.az:8513/gateway/payment/register?mid='.$mid.'&amount='.$amount.'&currency='.$currency.'&description='.$description.'&reference='.$reference.'&language='.$language.'&signature='.$signature;
                $xmlObj = (simplexml_load_file('https://pay.millikart.az/gateway/payment/register?mid='.$mid.'&amount='.$amount.'&currency='.$currency.'&description='.$description.'&reference='.$reference.'&language='.$language.'&signature='.$signature));
                if(isset($xmlObj->redirect)){
                    $this->redirect($xmlObj->redirect, TRUE, 301);
                }else{
                    $this->render('online');
                }
            }else{
                $this->render('sessionerror');
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
	    //$this->redirect('http://baratson.com', 302);
	    if(Yii::app()->user->isGuest)
            if(isset(Yii::app()->session['payid'])){
                $this->redirect(array('update','id'=>Yii::app()->session['payid']));
            }

		$model=new Payonline;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Payonline']))
		{
			$model->attributes=$_POST['Payonline'];
			$model->reference = 'Empty';
			$model->created_at = new DateTime('now', new DateTimeZone('Asia/Baku'));
			if($model->save()){
			    Yii::app()->session['payid'] = $model->id;
				$this->redirect(array('view','id'=>$model->id));
			}
		}

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
	    //$this->redirect('http://baratson.com', 302);
		$model=$this->loadModel($id);
		
		if(Yii::app()->user->isGuest){
            if($model->reference != 'Empty'){
                $this->redirect(array('create'));
            }else{
                if(isset(Yii::app()->session['payid'])){
                    if((Yii::app()->session['payid']*1) != $model->id){
                        $this->redirect(array('create'));
                    }
                }
            }
        }else{
            $this->layout='column2';
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Payonline']))
		{
			$model->attributes=$_POST['Payonline'];
			if(Yii::app()->user->isGuest) $model->reference = 'Empty'; // dont hack
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Payonline');
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
		$model=new Payonline('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Payonline']))
			$model->attributes=$_GET['Payonline'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Payonline the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Payonline::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Payonline $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payonline-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
