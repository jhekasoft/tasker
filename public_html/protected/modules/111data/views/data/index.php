<?php
/* @var $this DataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Datas',
);

$this->menu=array(
	array('label'=>'Create Data', 'url'=>array('create')),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    //'template'=>"{items}\n{pager}",
    //'template'=>"{pager}\n{items}\n{pager}",
    'template'=>"{summary}\n{sorter}\n{pager}\n{items}\n{pager}",
)); ?>
