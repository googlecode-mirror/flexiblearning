<?php
$this->breadcrumbs = array(
    $model->ownerBy->username => $model->ownerBy->href,
    Yii::t('zii', 'Blogs') => $model->ownerBy->href . '#blog-tab',
    Yii::t('zii', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Entry'), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('zii', 'Manage Entries') ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column')
        ),
        'title',
        array(
            'name' => 'created_date',
            'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->created_date)',
            'filter' => false
        ),
        array(
            'name' => 'updated_date',
            'value' => 'Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"],$data->updated_date)',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
