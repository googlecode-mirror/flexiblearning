<?php
$lesson = $model->lesson;
$lecture = $lesson->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('flexiblearn', $language->name) => $language->href,
    $category->name => $category->href,
    $lecture->title => $lecture->href,
    $lesson->title => $lesson->href,
    Yii::t('flexiblearn', 'Update video'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Video'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'View Video'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('flexiblearn', 'Manage Video'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Update Video')?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>