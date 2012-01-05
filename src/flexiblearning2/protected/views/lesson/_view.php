<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_vi')); ?>:</b>
	<?php echo CHtml::encode($data->title_vi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
	<?php echo CHtml::encode($data->title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ko')); ?>:</b>
	<?php echo CHtml::encode($data->title_ko); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_vi')); ?>:</b>
	<?php echo CHtml::encode($data->description_vi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_en')); ?>:</b>
	<?php echo CHtml::encode($data->description_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_ko')); ?>:</b>
	<?php echo CHtml::encode($data->description_ko); ?>
	<br />
</div>