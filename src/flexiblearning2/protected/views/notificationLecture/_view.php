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

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_vi')); ?>:</b>
	<?php echo CHtml::encode($data->content_vi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_en')); ?>:</b>
	<?php echo CHtml::encode($data->content_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_ko')); ?>:</b>
	<?php echo CHtml::encode($data->content_ko); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lecture')); ?>:</b>
	<?php echo CHtml::encode($data->id_lecture); ?>
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