<?php
$this->breadcrumbs=array(
    Yii::t('flexiblearn', 'Manage entries') => array('entry/admin'),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Manage entries')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'lesson-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'title',
        array(
            'name' => 'teaser',
            'filter' => false
        ),
        array(
            'name' => 'owner_by',
            'header' => Yii::t('flexiblearn', 'Owner by'),
            'value' => '$data->ownerBy->username',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>