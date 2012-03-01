<?php
    $this->breadcrumbs = array(
        Yii::t('zii', 'Languages') => array('admin'),
    );

    $this->menu = array(
        array('label' => Yii::t('zii', 'Create Language'), 'url' => array('create')),
    );
?>

<h1><?php echo Yii::t('zii', 'Manage Languages')?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'language-grid',
    'dataProvider' => new CActiveDataProvider(Language::model()),
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'htmlOptions' => array('class' => 'number-column'),
        ),
        'name_vi',
        'name_en',
        'name_ko',
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
        ),
    ),
));
?>
