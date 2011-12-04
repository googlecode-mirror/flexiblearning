<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numView'); ?>
		<?php echo $form->textField($model,'numView'); ?>
		<?php echo $form->error($model,'numView'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ranking'); ?>
		<?php echo $form->textField($model,'ranking'); ?>
		<?php echo $form->error($model,'ranking'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numRanking'); ?>
		<?php echo $form->textField($model,'numRanking'); ?>
		<?php echo $form->error($model,'numRanking'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idLesson'); ?>
		<?php echo $form->textField($model,'idLesson'); ?>
		<?php echo $form->error($model,'idLesson'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownerBy'); ?>
		<?php echo $form->textField($model,'ownerBy'); ?>
		<?php echo $form->error($model,'ownerBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approved'); ?>
		<?php echo $form->textField($model,'approved'); ?>
		<?php echo $form->error($model,'approved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'videoPath'); ?>
		<?php echo $form->textField($model,'videoPath'); ?>
		<?php echo $form->error($model,'videoPath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnailPath'); ?>
		<?php echo $form->textField($model,'thumbnailPath'); ?>
		<?php echo $form->error($model,'thumbnailPath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdDate'); ?>
		<?php echo $form->textField($model,'createdDate'); ?>
		<?php echo $form->error($model,'createdDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdBy'); ?>
		<?php echo $form->textField($model,'createdBy'); ?>
		<?php echo $form->error($model,'createdBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedDate'); ?>
		<?php echo $form->textField($model,'updatedDate'); ?>
		<?php echo $form->error($model,'updatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedBy'); ?>
		<?php echo $form->textField($model,'updatedBy'); ?>
		<?php echo $form->error($model,'updatedBy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->