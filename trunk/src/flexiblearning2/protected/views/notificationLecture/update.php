<?php
$this->breadcrumbs=array(
	'Notification Lectures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NotificationLecture', 'url'=>array('index')),
	array('label'=>'Create NotificationLecture', 'url'=>array('create')),
	array('label'=>'View NotificationLecture', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NotificationLecture', 'url'=>array('admin')),
);
?>

<h1>Update NotificationLecture <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>