<?php

$this->breadcrumbs=array(
    $model->category->language->name => $model->category->language->href,    
    $model->category->name => $model->category->href,
    Yii::t('zii', 'Update lesson'),
);

$this->menu = array(
    array('label' => 'View Lesson', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Lesson', 'url' => array('admin')),
);
?>

<h1>Update Lesson</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>