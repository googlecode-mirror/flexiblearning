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
		<?php echo $form->label($model,'id_nationality'); ?>
		<?php echo $form->textField($model,'id_nationality'); ?>
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
		<?php echo $form->label($model,'id_profession'); ?>
		<?php echo $form->textField($model,'id_profession'); ?>
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
		<?php echo $form->label($model,'flag_del'); ?>
		<?php echo $form->textField($model,'flag_del'); ?>
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
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_date'); ?>
		<?php echo $form->textField($model,'updated_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_add'); ?>
		<?php echo $form->textField($model,'ip_add',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->