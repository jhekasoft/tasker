<?php
/* @var $this TagPresetController */
/* @var $model TagPreset */

$this->breadcrumbs=array(
	'Tag Presets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TagPreset', 'url'=>array('index')),
	array('label'=>'Create TagPreset', 'url'=>array('create')),
	array('label'=>'Update TagPreset', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TagPreset', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TagPreset', 'url'=>array('admin')),
);
?>

<h1>View TagPreset #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>
