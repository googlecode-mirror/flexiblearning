<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateOfBirth'); ?>
		<?php echo $form->textField($model,'dateOfBirth'); ?>
		<?php echo $form->error($model,'dateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idNationality'); ?>
		<?php echo $form->textField($model,'idNationality'); ?>
		<?php echo $form->error($model,'idNationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProfession'); ?>
		<?php echo $form->textField($model,'idProfession'); ?>
		<?php echo $form->error($model,'idProfession'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'favorite'); ?>
		<?php echo $form->textField($model,'favorite',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'favorite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idRole'); ?>
		<?php echo $form->textField($model,'idRole'); ?>
		<?php echo $form->error($model,'idRole'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledFullName'); ?>
		<?php echo $form->textField($model,'enabledFullName'); ?>
		<?php echo $form->error($model,'enabledFullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledDateOfBirth'); ?>
		<?php echo $form->textField($model,'enabledDateOfBirth'); ?>
		<?php echo $form->error($model,'enabledDateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledAddress'); ?>
		<?php echo $form->textField($model,'enabledAddress'); ?>
		<?php echo $form->error($model,'enabledAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledNationality'); ?>
		<?php echo $form->textField($model,'enabledNationality'); ?>
		<?php echo $form->error($model,'enabledNationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledTel'); ?>
		<?php echo $form->textField($model,'enabledTel'); ?>
		<?php echo $form->error($model,'enabledTel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledEmail'); ?>
		<?php echo $form->textField($model,'enabledEmail'); ?>
		<?php echo $form->error($model,'enabledEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledProfession'); ?>
		<?php echo $form->textField($model,'enabledProfession'); ?>
		<?php echo $form->error($model,'enabledProfession'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabledFavorite'); ?>
		<?php echo $form->textField($model,'enabledFavorite'); ?>
		<?php echo $form->error($model,'enabledFavorite'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'lastLoginDate'); ?>
		<?php echo $form->textField($model,'lastLoginDate'); ?>
		<?php echo $form->error($model,'lastLoginDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipAddress'); ?>
		<?php echo $form->textField($model,'ipAddress',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ipAddress'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->