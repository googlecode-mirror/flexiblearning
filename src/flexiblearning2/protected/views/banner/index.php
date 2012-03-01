<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Banners'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Banner'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Banners')?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
