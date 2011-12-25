<?php
$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Create Lesson', 'url'=>array('create')),
	array('label'=>'Update Lesson', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lesson', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>View Lesson #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_vi',
		'title_en',
		'title_ko',
		'description_vi',
		'description_en',
		'description_ko',
		'price',
		'flag_del',
		'flag_approve',
		'id_category',
		'created_by',
		'created_date',
		'updated_by',
		'updated_date',
	),
)); ?>
