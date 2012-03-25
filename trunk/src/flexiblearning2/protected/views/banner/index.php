<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Banners'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Banner'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'Manage Banner'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Banners')?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
