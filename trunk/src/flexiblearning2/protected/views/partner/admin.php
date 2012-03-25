<?php
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Partners') => array('index'),
);

$this->menu = array(
    array('label' => Yii::t('flexiblearn', 'Create Partner'), 'url' => array('create')),
);

?>

<h1><?php echo Yii::t('flexiblearn', 'Manage Partners')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'partner-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        array(
            'name' => 'address',
            'filter' => false
        ),
        'email',
        array(
            'name' => 'tel',
            'filter' => false
        ),
        array(
            'class'=>'EImageColumn',
            'name' => 'logo_path',
            'htmlOptions' => array(
                'style' => 'width: 150px;',                
            ),
            'alt' => Yii::t('flexiblearn', 'No logo')
        ),
        array(
            'header' => Yii::t('flexiblearn', 'Link'),
            'type' => 'raw',
            'value' => 'CHtml::link("$data->contact_link",$data->contact_link)'
        ),
        array(
            'class' => 'CButtonColumn',            
        ),
    ),
));
?>
