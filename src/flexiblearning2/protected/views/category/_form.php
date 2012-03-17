<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'category-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">
        <?php echo Yii::t('zii', 'Fields with')?>
        &nbsp;
        <span class="required">*</span> <?php echo Yii::t('zii', 'are required')?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_language'); ?>
        <div>
            <?php echo $form->dropDownList($model, 'id_language', CHtml::listData(Language::model()->findAll(), 'id', 'name')) ?>
            <?php echo $form->error($model,'id_language'); ?>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'name_vi'); ?>
        <div>
            <?php echo $form->textField($model,'name_vi',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'name_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_en'); ?>
        <div>
            <?php echo $form->textField($model,'name_en',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'name_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_ko'); ?>
        <div>
            <?php echo $form->textField($model,'name_ko',array('size'=>50,'maxlength'=>50)); ?>
            <?php echo $form->error($model,'name_ko'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_vi'); ?>
        <div>
            <?php 
               $this->widget('ext.tinymce.ETinyMce', array(
                   'model' => $model,
                   'attribute' => 'description_vi',
                   'editorTemplate' => 'simple',
                   'height'=>'100px',
                   'width' =>'450px',
                   )
               ); 
           ?>
           <?php echo $form->error($model,'description_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_en'); ?>
        <div>
            <?php 
               $this->widget('ext.tinymce.ETinyMce', array(
                   'model' => $model,
                   'attribute' => 'description_en',
                   'editorTemplate' => 'simple',
                   'height'=>'100px',
                   'width' =>'450px',
                   )
               ); 
            ?>
            <?php echo $form->error($model,'description_en'); ?>
        </div>    
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description_ko'); ?>
        <div>
            <?php 
               $this->widget('ext.tinymce.ETinyMce', array(
                   'model' => $model,
                   'attribute' => 'description_ko',
                   'editorTemplate' => 'simple',
                   'height'=>'100px',
                   'width' =>'450px',
                   )
               ); 
            ?>
            <?php echo $form->error($model,'description_ko'); ?>
        </div>
    </div>

    <?php if (Yii::app()->user->checkAccess('adminCategory')) : ?>
        <div class="row">
            <?php echo $form->labelEx($model,'is_active'); ?>
            <div>
                <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
                <?php echo $form->error($model,'is_active'); ?>
            </div>
        </div>
    <?php endif;?>

    <div class="row buttons">
        <label>&nbsp;</label>
        <div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 
                    Yii::t('zii', 'Create') : Yii::t('zii', 'Save'), array('class' => 'bt')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->