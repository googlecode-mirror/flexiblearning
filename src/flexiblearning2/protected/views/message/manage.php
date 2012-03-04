<?php
    $this->breadcrumbs = array(
        $viewer->username => $viewer->href,
        Yii::t('zii', 'Messages'),
    );
?>

<h1><?php echo Yii::t('zii', 'Messages')?></h1>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'lesson-grid',
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'header' => Yii::t('zii', 'No'),
                'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                'htmlOptions' => array('class' => 'number-column'),
            ),
            array(
                'header' => Yii::t('zii', 'From'),
                'value' => 'CHtml::link($data->fromUser->username, $data->fromUser->href)',
                'type' => 'raw'
            ),
            array(
                'name' => 'teaser',
                'type' => 'raw',
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
?>
