<?php
/* @var $this DefaultController */
/* @var $model Task */

echo $this->renderPartial('_breadcrumbs');

$this->breadcrumbs[]='Create';


$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Create Task</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>