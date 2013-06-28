<?php

class DefaultController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'childs'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'done'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        //var_dump('asdf');exit();
		$model=new Info;
        
        
        
        if(null === $model->data) {
            $model->data = new Data;
        }
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        
        if(Yii::app()->request->getParam('Data') && Yii::app()->request->getParam('Info'))
		{
			$model->data->attributes=Yii::app()->request->getParam('Data');
            $model->attributes=Yii::app()->request->getParam('Info');
            
            if($model->data->validate() && $model->validate()) {
                $model->data->save();
                $model->data_id = $model->data->id;
                $model->save();
                
                if(!empty($model->info_id)) {
                    $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}', 'info_id'=>$model->info_id));
                } else {
                    $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}'));
                }
                
            }
		}
        
//        echo '<pre>';
//        var_dump($model->data);
//        echo '</pre>';
//        exit();
        

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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if(null === $model->data) {
            $model->data = new Data;
        }
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        
        if(Yii::app()->request->getParam('Data') && Yii::app()->request->getParam('Info'))
		{
			$model->data->attributes=Yii::app()->request->getParam('Data');
            $model->attributes=Yii::app()->request->getParam('Info');
            
            if($model->data->validate() && $model->validate()) {
                $model->data->save();
                $model->data_id = $model->data->id;
                $model->save();
                
                if(!empty($model->info_id)) {
                    $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}', 'info_id'=>$model->info_id));
                } else {
                    $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}'));
                }
                
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
    
    public function actionDone($id)
	{
		$model = $this->loadModel($id);
        $model->progress = 'done';
        $model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax'])) {
            if(!empty($model->info_id)) {
                $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}', 'info_id'=>$model->info_id));
            } else {
                $this->redirect(array('/info/default/index', 'filter'=>'{"onlyNew":"yes"}'));
            }
        }
//        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria = new CDbCriteria();
        $criteria->order = "`progress` ASC, `todo_time` DESC";
        
        
        $info_id = Yii::app()->request->getParam('info_id');
        if($info_id) {
            $criteria->addCondition("`info_id`='{$info_id}'");
        } else {
            $criteria->addCondition("`info_id`='0'");
        }
        
        $filter = json_decode(Yii::app()->request->getParam('filter'));
        if(!empty($filter->onlyNew) && 'yes' == $filter->onlyNew) {
            $criteria->scopes[] = 'new';
            //&filter={"onlyNew":"yes"}
            //&info_id=6
        }
        
//        echo '<pre>';
//        var_dump($criteria->order);
//        echo '</pre>';
//        exit();
        
        //$criteria->scopes
        
        $dataProvider=new CActiveDataProvider(Info::model(), array(
                'criteria' => $criteria,
            )
        );
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    
//	public function actionChilds($info_id)
//	{
//		$dataProvider=new CActiveDataProvider(Info::model()->new()
//            , array(
//                'criteria' => array(
//                    'condition' => "`info_id`='{$info_id}'",
//                    'order' => "todo_time ASC",
//                ),
//            )
//        );
//        
//		$this->render('childs',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Info('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Info']))
			$model->attributes=$_GET['Info'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Info the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Info::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Info $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
