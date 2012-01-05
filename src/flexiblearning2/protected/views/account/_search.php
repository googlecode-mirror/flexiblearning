<div class="wide form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'fullname'); ?>
        <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dateOfBirth'); ?>
        <?php echo $form->textField($model, 'dateOfBirth'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'address'); ?>
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'id_nationality'); ?>
        <?php echo $form->textField($model, 'id_nationality'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tel'); ?>
        <?php echo $form->textField($model, 'tel', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'id_profession'); ?>
        <?php echo $form->textField($model, 'id_profession'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'favorite'); ?>
        <?php echo $form->textField($model, 'favorite', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'avatar'); ?>
        <?php echo $form->textField($model, 'avatar', array('size' => 60, 'maxlength' => 256)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'flag_del'); ?>
        <?php echo $form->textField($model, 'flag_del'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- search-form -->