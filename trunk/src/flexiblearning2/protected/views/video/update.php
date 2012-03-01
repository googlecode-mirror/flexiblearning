<?php
$lesson = $model->lesson;
$lecture = $lesson->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    $lecture->title => $lecture->href,
    $lesson->title => $lesson->href,
    Yii::t('zii', 'Update video'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Video'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'View Video'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('zii', 'Manage Video'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Update Video')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>