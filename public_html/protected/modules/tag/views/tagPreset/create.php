<?php
/* @var $this TagPresetController */
/* @var $model TagPreset */

$this->breadcrumbs=array(
	'Tag Presets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TagPreset', 'url'=>array('index')),
	array('label'=>'Manage TagPreset', 'url'=>array('admin')),
);
?>

<h1>Create TagPreset</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>