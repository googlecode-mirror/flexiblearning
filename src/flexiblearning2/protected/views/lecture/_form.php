<div class="form">

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lecture-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ), 
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); 
?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php if (Yii::app()->user->checkAccess('adminLecture')) : ?>
        <div class="row">
            <?php echo CHtml::label('Language', ''); ?>
            <?php
                echo $form->dropDownList(
                    $model, 
                    'id_language', 
                    CHtml::listData(Language::model()->findAll(), 'id', 'name'),
                    array(
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => $this->createUrl('category/listByLanguage'),
                            'update' => '#Lecture_id_category'
                        )
                    )
                ); 
            ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'id_category'); ?>
            <div>
                <?php 
                    if ($model->id_language) {
                        echo $form->dropDownList($model, 'id_category', 
                            CHtml::listData(Category::model()->findAll("id_language = {$model->id_language}"), 'id', 'name')); 
                    } else {
                        echo $form->dropDownList($model, 'id_category', CHtml::listData(Category::model()->findAll(), 'id', 'name')); 
                    }
                ?>
                <?php echo $form->error($model, 'id_category'); ?>
            </div>
        </div>            
    <?php endif; ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title_en'); ?>
        <div>
            <?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>256)); ?>
            <?php echo $form->error($model,'title_en'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_vi'); ?>
        <div>
            <?php echo $form->textField($model,'title_vi',array('size'=>60,'maxlength'=>256)); ?>
            <?php echo $form->error($model,'title_vi'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_ko'); ?>
        <div>
            <?php echo $form->textField($model,'title_ko',array('size'=>60,'maxlength'=>256)); ?>
            <?php echo $form->error($model,'title_ko'); ?>
        </div>
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
        <?php echo $form->labelEx($model,'fileIntro'); ?>
        <div>
            <?php 
//                echo CHtml::activeFileField($model, 'fileIntro')
                echo $form->hiddenField($model,'path_video_intro');
            ?>
            <?php 
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                    array(
                        'id' => 'uploadFile',
                        'config' => array(
                            'action' => $this->createUrl('lecture/upload'),
                            'allowedExtensions' => Yii::app()->params['arrayVideoExtensions'],
                            'sizeLimit' => Yii::app()->params['videoMaxSize'],// maximum file size in bytes
                            'onComplete' => "js:function(id, fileName, responseJSON){ $('#Lecture_path_video_intro').val(responseJSON.file);}",
                            'messages' => array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                 'emptyError'=>"{file} is empty, please select files again without it.",
                                 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                            ),
                        )
                )); 
            ?>
            <?php echo $form->error($model,'path_video_intro'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'is_active'); ?>
        <div>
            <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
            <?php echo $form->error($model,'is_active'); ?>
        </div>
    </div>

    <div class="row buttons">
         <?php echo CHtml::submitButton($model->isNewRecord ? 
             Yii::t('zii', 'Create') : Yii::t('zii', 'Saves'), 
             array('class' => 'bt')); ?>    
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->