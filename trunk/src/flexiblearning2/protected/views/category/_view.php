<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idLanguage')); ?>:</b>
    <?php echo CHtml::encode($data->language->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
    <?php echo CHtml::encode($data->state); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createdDate')); ?>:</b>
    <?php echo date(Yii::app()->params['dateFormat'], $data->createdDate); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
    <?php echo CHtml::encode($data->createdByUser->username); ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('updatedDate')); ?>:</b>
    <?php echo date(Yii::app()->params['dateFormat'], $data->updatedDate); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('updatedBy')); ?>:</b>
    <?php echo CHtml::encode($data->updatedByUser->username); ?>
    <br />  

</div>