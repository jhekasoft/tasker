<?php
/* @var $this TagPresetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tag Presets',
);

$this->menu=array(
	array('label'=>'Create TagPreset', 'url'=>array('create')),
	array('label'=>'Manage TagPreset', 'url'=>array('admin')),
);
?>

<h1>Tag Presets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
