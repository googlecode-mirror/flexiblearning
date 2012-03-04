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
        <?php echo $form->label($model, 'id_lesson'); ?>
        <div>
            <?php
            echo CHtml::link($model->lesson->title, $model->lesson->href);
            ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <div>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256)); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_vi'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'attribute' => 'description_vi',
            'model' => $model,
            'editorTemplate' => 'simple',
            'height' => '100px',
            'width' => '450px')
        );
        ?>
        <?php echo $form->error($model, 'description_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_en'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'attribute' => 'description_en',
            'model' => $model,
            'editorTemplate' => 'simple',
            'height' => '100px',
            'width' => '450px')
        );
        ?>
        <?php echo $form->error($model, 'description_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description_ko'); ?>
        <?php
        $this->widget('application.extensions.tinymce.ETinyMce', array(
            'attribute' => 'description_ko',
            'model' => $model,
            'editorTemplate' => 'simple',
            'height' => '100px',
            'width' => '450px')
        );
        ?>
        <?php echo $form->error($model, 'description_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>
        <div>
            <?php 
//                echo CHtml::activeFileField($model, 'file');
                echo $form->hiddenField($model, 'path');
                $this->widget('ext.EAjaxUpload.EAjaxUpload',
                    array(
                        'id' => 'uploadFile',
                        'config' => array(
                            'action' => $this->createUrl('video/upload'),
                            'allowedExtensions' => Yii::app()->params['arrayVideoExtensions'],
                            'sizeLimit' => Yii::app()->params['videoMaxSize'],// maximum file size in bytes
                            'onComplete' => "js:function(id, fileName, responseJSON){ $('#Video_path').val(responseJSON.file);}",
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
            
            <?php echo $form->error($model, 'path'); ?>
        </div>
    </div>

    <?php if (Yii::app()->user->checkAccess('adminVideo')) : ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'is_active'); ?>
            <div>
                <?php echo $form->checkBox($model, 'is_active', array('uncheckValue' => 0)) ?>
                <?php echo $form->error($model, 'is_active'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="row buttons">
        <label>&nbsp;</label>
        <?php echo CHtml::submitButton(isset($model->id) ? 'Save' : 'Create', array('class' => 'bt')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->