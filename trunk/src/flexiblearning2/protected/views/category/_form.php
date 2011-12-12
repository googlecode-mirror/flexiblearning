<div class="form">

    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'category-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'idLanguage'); ?>
        <?php echo $form->dropDownList($model, 'idLanguage', CHtml::listData(Language::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'idLanguage'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'state'); ?>
        <?php echo $form->checkBox($model, 'state'); ?>            
        <?php echo $form->error($model, 'state'); ?>
    </div>	

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->