<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<h1>Create Video</h1>

<?php 
    $arrayModels = array('model' => $model);
    if (isset($modelVideo)) {
        $arrayModels['modelLesson'] = $modelVideo;
    }
    echo $this->renderPartial('_form', $arrayModels); 
?>