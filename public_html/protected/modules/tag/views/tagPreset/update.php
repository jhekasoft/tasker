<?php
/* @var $this TagPresetController */
/* @var $model TagPreset */

$this->breadcrumbs=array(
	'Tag Presets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TagPreset', 'url'=>array('index')),
	array('label'=>'Create TagPreset', 'url'=>array('create')),
	array('label'=>'View TagPreset', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TagPreset', 'url'=>array('admin')),
);
?>

<h1>Update TagPreset <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>