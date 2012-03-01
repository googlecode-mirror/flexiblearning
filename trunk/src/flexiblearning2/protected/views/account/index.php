<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Accounts'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Account'), 'url' => array('create')),
    array('label' => Yii::t('zii', 'Manage Account'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Accounts')?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
