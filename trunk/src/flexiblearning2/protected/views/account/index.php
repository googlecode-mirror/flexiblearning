<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Accounts'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Account'), 'url' => array('create')),
    array('label' => Yii::t('flexiblearn', 'Manage Accounts'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Accounts')?></h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
