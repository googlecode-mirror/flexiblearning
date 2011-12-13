<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateOfBirth'); ?>
		<?php echo $form->textField($model,'dateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idNationality'); ?>
		<?php echo $form->textField($model,'idNationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idProfession'); ?>
		<?php echo $form->textField($model,'idProfession'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'favorite'); ?>
		<?php echo $form->textField($model,'favorite',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idRole'); ?>
		<?php echo $form->textField($model,'idRole'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledFullName'); ?>
		<?php echo $form->textField($model,'enabledFullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledDateOfBirth'); ?>
		<?php echo $form->textField($model,'enabledDateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledAddress'); ?>
		<?php echo $form->textField($model,'enabledAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledNationality'); ?>
		<?php echo $form->textField($model,'enabledNationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledTel'); ?>
		<?php echo $form->textField($model,'enabledTel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledEmail'); ?>
		<?php echo $form->textField($model,'enabledEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledProfession'); ?>
		<?php echo $form->textField($model,'enabledProfession'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabledFavorite'); ?>
		<?php echo $form->textField($model,'enabledFavorite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdDate'); ?>
		<?php echo $form->textField($model,'createdDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdBy'); ?>
		<?php echo $form->textField($model,'createdBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedDate'); ?>
		<?php echo $form->textField($model,'updatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedBy'); ?>
		<?php echo $form->textField($model,'updatedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastLoginDate'); ?>
		<?php echo $form->textField($model,'lastLoginDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ipAddress'); ?>
		<?php echo $form->textField($model,'ipAddress',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->