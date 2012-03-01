<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Partners') => array('index'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Partner'), 'url' => array('create')),
);

?>

<h1><?php echo Yii::t('zii', 'Manage Partners')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'partner-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'address',
        'email',
        'tel',
        array(
            'class'=>'EImageColumn',
            'name' => 'logo_path',
            'htmlOptions' => array(
                'style' => 'width: 150px;',                
            ),
            'alt' => Yii::t('zii', 'No logo')
        ),
        array(
            'header' => Yii::t('zii', 'Link'),
            'type' => 'raw',
            'value' => 'CHtml::link("$data->contact_link",$data->contact_link)'
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
