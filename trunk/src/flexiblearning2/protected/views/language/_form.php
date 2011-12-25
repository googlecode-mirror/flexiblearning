<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'language-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name_vn'); ?>
		<?php echo $form->textField($model,'name_vn',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name_vn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ko'); ?>
		<?php echo $form->textField($model,'name_ko',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name_ko'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->