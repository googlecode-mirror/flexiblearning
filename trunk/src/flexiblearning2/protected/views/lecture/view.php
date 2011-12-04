<?php
$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	$model->name,
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
		'name',
		array(
                    'name' => 'description',
                    'value' => $model->description,
                    'visible' => $model->description == null ? false : true, 
                ),
		'price',
		array(
                    'name' => 'idCategory',
                    'value' => $model->category->name,                    
                ),
		array(
                    'name' => 'createdDate',
                    'value' => date(Yii::app()->params['dateFormat'], $model->createdDate),
                ),
		array(
                    'name' => 'createdBy',
                    'value' => $model->createdByUser->username,
                ),
		array(
                    'name' => 'updatedDate',
                    'value' => date(Yii::app()->params['dateFormat'], $model->updatedDate),
                ),
		array(
                    'name' => 'updatedBy',
                    'value' => $model->updatedByUser->username,
                ),
	),
)); ?>
