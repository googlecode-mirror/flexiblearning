<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLecture')); ?>:</b>
	<?php echo CHtml::encode($data->lecture->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdDate')); ?>:</b>
        <?php echo date(Yii::app()->params['dateFormat'], $data->createdDate); ?>	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedDate')); ?>:</b>
	<?php echo date(Yii::app()->params['dateFormat'], $data->updatedDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo $data->createdByUser->username; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedBy')); ?>:</b>
	<?php echo $data->updatedByUser->username; ?>
	<br />


</div>