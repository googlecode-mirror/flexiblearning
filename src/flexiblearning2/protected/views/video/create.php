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
    Yii::t('flexiblearn', 'Create video'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'List Video'), 'url' => array('index')),
    array('label' => Yii::t('flexiblearn', 'Manage Video'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create video'); ?></h1>

<?php
$arrayModels = array('model' => $model);
if (isset($modelVideo)) {
    $arrayModels['modelVideo'] = $modelVideo;
}
echo $this->renderPartial('_form', $arrayModels);
?>