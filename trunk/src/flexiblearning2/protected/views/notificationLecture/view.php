<?php
$this->breadcrumbs=array(
	'Notification Lectures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NotificationLecture', 'url'=>array('index')),
	array('label'=>'Create NotificationLecture', 'url'=>array('create')),
	array('label'=>'Update NotificationLecture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NotificationLecture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NotificationLecture', 'url'=>array('admin')),
);
?>

<h1>View NotificationLecture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_vi',
		'title_en',
		'title_ko',
		'content_vi',
		'content_en',
		'content_ko',
		'id_lecture',
		'created_by',
		'created_date',
		'updated_by',
		'updated_date',
	),
)); ?>
