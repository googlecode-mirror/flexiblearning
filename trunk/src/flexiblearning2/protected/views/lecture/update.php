<?php
$category = $model->category;
$this->breadcrumbs = array(
    $category->name => $category->href,
    $model->title => array('view', 'id' => $model->id),
    Yii::t('zii', 'Update'),
);

$this->menu=array(
	array('label'=>'Create Lecture', 'url'=>array('create')),
	array('label'=>'View Lecture', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lecture', 'url'=>array('admin')),
);
?>

<h1>Update Lecture</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>