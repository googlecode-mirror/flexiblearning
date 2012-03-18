<?php
$this->breadcrumbs=array(
	'Notification Lectures',
);

$this->menu=array(
	array('label'=>'Create NotificationLecture', 'url'=>array('create')),
	array('label'=>'Manage NotificationLecture', 'url'=>array('admin')),
);
?>

<h1>Notification Lectures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
