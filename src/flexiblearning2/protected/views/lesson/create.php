<?php
$this->breadcrumbs=array(
	'Lessons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lesson', 'url'=>array('index')),
	array('label'=>'Manage Lesson', 'url'=>array('admin')),
);
?>

<h1>Create Lesson</h1>

<?php 
    $arrayModels = array('model' => $model);
    if (isset($modelLesson)) {
        $arrayModels['modelLesson'] = $modelLesson;
    }
    echo $this->renderPartial('_form', $arrayModels); 
?>