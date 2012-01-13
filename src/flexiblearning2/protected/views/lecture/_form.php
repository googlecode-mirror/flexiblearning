<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lecture-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ), 
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title_en'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'title_vi'); ?>
		<?php echo $form->textField($model,'title_vi',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title_vi'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'title_ko'); ?>
		<?php echo $form->textField($model,'title_ko',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title_ko'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'content_en'); ?>
            <div>
                <?php 
                   $this->widget('ext.tinymce.ETinyMce', array(
                       'model' => $model,
                       'attribute' => 'content_en',
                       'editorTemplate' => 'simple',
                       'height'=>'100px',
                       'width' =>'450px',
                       )
                   ); 
               ?>
                <?php echo $form->error($model,'content_en'); ?>
            </div>
        </div>
        
	<div class="row">
            <?php echo $form->labelEx($model,'content_vi'); ?>
            <div>
                <?php 
                   $this->widget('ext.tinymce.ETinyMce', array(
                       'model' => $model,
                       'attribute' => 'content_vi',
                       'editorTemplate' => 'simple',
                       'height'=>'100px',
                       'width' =>'450px',
                       )
                   ); 
               ?>
                <?php echo $form->error($model,'content_vi'); ?>
            </div>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'content_ko'); ?>
            <div>
                <?php 
                   $this->widget('ext.tinymce.ETinyMce', array(
                       'model' => $model,
                       'attribute' => 'content_ko',
                       'editorTemplate' => 'simple',
                       'height'=>'100px',
                       'width' =>'450px',
                       )
                   ); 
               ?>
                <?php echo $form->error($model,'content_ko'); ?>
            </div>
        </div>
        
	<div class="row">
            <?php echo $form->labelEx($model,'id_category'); ?>
            <?php echo $form->dropDownList($model,'id_category', CHtml::listData(Category::model()->findAllByAttributes(array('is_active' => 1)), 'id', 'name') ); ?>
            <?php echo $form->error($model,'id_category'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'fileIntro'); ?>
            <?php echo CHtml::activeFileField($model, 'fileIntro')?>
            <?php echo $form->error($model,'fileIntro'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'is_active'); ?>
            <div>
                <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
                <?php echo $form->error($model,'is_active'); ?>
            </div>
        </div>

	<div class="row buttons">
             <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', 
                     array('class' => 'bt')); ?>    
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->