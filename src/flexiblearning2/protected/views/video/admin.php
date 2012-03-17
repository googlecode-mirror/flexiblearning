<?php
$this->breadcrumbs = array(
    Yii::t('zii', 'Manage videos') => array('video/admin'),
);

$this->menu = array(
    array('label' => Yii::t('zii', 'Create Video'), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t('zii', 'Manage Videos') ?></h1>

<div class="block-area">
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'video-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'name',
            'description',
            'numView',
            'ranking',
            'numRanking',
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
</div>