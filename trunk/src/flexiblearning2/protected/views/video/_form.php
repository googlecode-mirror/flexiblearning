<div class="form">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'video-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    echo $form->errorSummary($model);
    if (isset($modelVideo)) {
        echo $form->errorSummary($modelVideo);
    }
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_vi'); ?>
        <?php 
           $this->widget('application.extensions.tinymce.ETinyMce', array(
               'name'=>'description_vi',
               'editorTemplate' => 'simple',
               'height'=>'100px',
               'width' =>'450px')
           ); 
        ?>
        <?php echo $form->error($model, 'description_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_en'); ?>
        <?php 
           $this->widget('application.extensions.tinymce.ETinyMce', array(
               'name'=>'description_en',
               'editorTemplate' => 'simple',
               'height'=>'100px',
               'width' =>'450px')
           ); 
        ?>
        <?php echo $form->error($model, 'description_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_ko'); ?>
        <?php 
           $this->widget('application.extensions.tinymce.ETinyMce', array(
               'name'=>'description_ko',
               'editorTemplate' => 'simple',
               'height'=>'100px',
               'width' =>'450px')
           ); 
        ?>
        <?php echo $form->error($model, 'description_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>
        <?php echo CHtml::activeFileField($model, 'file') ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row buttons">
      <?php echo CHtml::submitButton(isset($model->id) ? 'Save' : 'Create'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->