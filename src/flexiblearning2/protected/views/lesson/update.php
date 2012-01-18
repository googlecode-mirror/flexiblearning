<?php
$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs=array(
    $language->name => $language->href,
    $category->name => $category->href,
    $lecture->title => $lecture->href,
    $model->title => $model->href,
    Yii::t('zii', 'Update lesson'),
);

$this->menu = array(
    array('label' => 'View Lesson', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Lesson', 'url' => array('admin')),
);
?>

<h1>Update Lesson</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>