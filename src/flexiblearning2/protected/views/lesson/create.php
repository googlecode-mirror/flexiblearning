<?php
    $category = $model->category;
    $language = $category->language;
    
$this->breadcrumbs=array(
    $language->name => $language->getHref(),    
    $category->name => $category->getHref(),
    Yii::t('default', 'Create lesson'),
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