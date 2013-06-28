<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Infos' => array('/info/', 'filter'=>'{"onlyNew":"yes"}'),
);

if(Yii::app()->request->getParam('info_id')) {
    $breadcrumbs = array();
    
    $parentInfoId = Yii::app()->request->getParam('info_id');
    do {
        $parentInfo = Info::model()->findByPk($parentInfoId);
        $parentInfoId = $parentInfo->info_id;
        $breadcrumbs[$parentInfo->description] = array('/info/', 'filter'=>'{"onlyNew":"yes"}', 'info_id'=>$parentInfo->id);
    } while(!empty($parentInfoId));
    
    if(count($breadcrumbs)) {
        foreach(array_reverse($breadcrumbs) as $key => $item) {
            $this->breadcrumbs[$key] = $item;
        }
    }
}

$this->menu=array(
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Infos</h1>

<div style="">
    <?php
    if(Yii::app()->request->getParam('info_id')) {
        $params = array('create', 'info_id' => Yii::app()->request->getParam('info_id'));
    } else {
        $params = array('create');
    }?>
    <?php echo CHtml::link('Add Info', $params, array('style'=>'background-color:#00cc00; padding:5px;')); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
