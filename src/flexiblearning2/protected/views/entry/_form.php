<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'entry-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <div>
            <?php echo $form->textField($model, 'title') ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'fileThumbnail'); ?>
        <div>
            <?php if ($model->imagepath) : ?>
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->thumbnailPath ?>" class="thumbnail" />
            <?php endif; ?>
            <?php echo CHtml::activeFileField($model, 'fileThumbnail') ?>
            <?php echo $form->error($model, 'fileThumbnail'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <div>
            <?php 
               $this->widget('ext.tinymce.ETinyMce', array(
                   'model' => $model,
                   'attribute' => 'content',
                   'editorTemplate' => 'full',
                   'height'=>'400px',
                   'width' =>'100%',
                   )
               ); 
           ?>
            <?php echo $form->error($model,'content'); ?>
        </div>
    </div>

    <div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'bt')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->