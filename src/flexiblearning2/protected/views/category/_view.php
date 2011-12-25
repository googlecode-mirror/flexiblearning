<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_vi')); ?>:</b>
	<?php echo CHtml::encode($data->name_vi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ko')); ?>:</b>
	<?php echo CHtml::encode($data->name_ko); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_language')); ?>:</b>
	<?php echo CHtml::encode($data->id_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_del')); ?>:</b>
	<?php echo CHtml::encode($data->flag_del); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_date')); ?>:</b>
	<?php echo CHtml::encode($data->updated_date); ?>
	<br />

	*/ ?>

</div>