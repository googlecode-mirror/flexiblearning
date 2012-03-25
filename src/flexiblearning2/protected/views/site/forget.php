<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('flexiblearn', 'Forget the password');
$this->breadcrumbs = array(
    Yii::t('flexiblearn', 'Forget the password'),
);
?>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'forget-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>
    <table width="940" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="top" id="caption" colspan="2">
                <span id="title-text"><?php echo Yii::t('flexiblearn', 'Forget password')?></span>
            </td>
        </tr>    
        <tr>
            <td id="bg-td">
                <?php echo CHtml::errorSummary($model) ?>
                <table width="800" border="0" class="top" id="regis-wrap">
                    <tr>
                        <td width="398">&nbsp;</td>
                        <td width="392">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="400" border="0" cellspacing="10">
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <?php if (Yii::app()->user->hasFlash('forget')): ?>
                                            <div style="color: #0066ff">
                                                <?php echo Yii::app()->user->getFlash('forget'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td><?php echo $form->labelEx($model, 'username'); ?></td>
                                    <td>
                                        <?php echo $form->textField($model, 'username'); ?>
                                        <?php echo $form->error($model, 'username'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $form->labelEx($model, 'email'); ?></td>
                                    <td>
                                        <?php echo $form->textField($model, 'email'); ?>
                                        <?php echo $form->error($model, 'email'); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo CHtml::activeLabelEx($model, 'verifiedCode') ?></td>
                                    <td>                                    
                                        <?php $this->widget('CCaptcha', array('buttonType' => 'button')) ?>                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <?php echo CHtml::activeTextField($model, 'verifiedCode') ?>
                                        <?php echo CHtml::error($model, 'verifiedCode') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <?php echo CHtml::submitButton(Yii::t('flexiblearn', 'Ok'), array('class' => 'bt')); ?> &nbsp;
                                        <span style="color: #0066ff">
                                            <?php echo CHtml::link(Yii::t('flexiblearn', 'Cancel'), array('site/index'));?>    
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>				
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
</div>