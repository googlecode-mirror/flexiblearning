<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'fullname'); ?>
            <div>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'fullname'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'dateOfBirth'); ?>
            <div>
		<?php echo $form->textField($model,'dateOfBirth'); ?>
		<?php echo $form->error($model,'dateOfBirth'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'address'); ?>
            <div>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'address'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'id_nationality'); ?>
            <div>
                <?php echo $form->textField($model,'id_nationality'); ?>
		<?php echo $form->error($model,'id_nationality'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'tel'); ?>
            <div>
		<?php echo $form->textField($model,'tel',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'tel'); ?>
            </div>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <div>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
            </div>
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
		<?php echo $form->labelEx($model,'id_profession'); ?>
		<?php echo $form->textField($model,'id_profession'); ?>
		<?php echo $form->error($model,'id_profession'); ?>
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
		<?php echo $form->labelEx($model,'ipAddress'); ?>
		<?php echo $form->textField($model,'ipAddress',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ipAddress'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->