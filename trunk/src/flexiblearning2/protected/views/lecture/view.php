<?php
$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Lecture', 'url'=>array('index')),
	array('label'=>'Create Lecture', 'url'=>array('create')),
	array('label'=>'Update Lecture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lecture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lecture', 'url'=>array('admin')),
);
?>

<h1>View Lecture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'title',
		array(
                    'name' => 'description',
                    'value' => $model->content,
                    'visible' => $model->content == null ? false : true, 
                ),
		array(
                    'name' => 'idCategory',
                    'value' => $model->category->name,                    
                ),
	),
)); ?>