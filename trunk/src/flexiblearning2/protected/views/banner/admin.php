<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Banners') => array('admin'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Banner'), 'url' => array('create')),
);
?>

<h1>Manage Banners</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'banner-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'banner_link',
        array(
            'name' => 'id_partner',
            'header' => 'Partner',
            'value' => '$data->partner->name',
            'filter' => CHtml::listData(Partner::model()->findAll(), 'id', 'name'),
        ),
        array(
            'class'=>'EImageColumn',
            'name' => 'ad_path',
            'htmlOptions' => array(
                'style' => 'width: 150px;',                
            ),
        ),
        array(
            'name' => 'is_active',
            'filter' => array('0' => 'No', '1' => 'Yes'),
            'value' => '($data->is_active)?"Yes":"No"',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
