<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'account-form',
    'enableAjaxValidation' => false,
    'action' => $this->createUrl('account/update', array('id' => $model->getPrimaryKey()))
));
?>
<?php echo $form->errorSummary($model); ?>
<table width="750" border="0">
    <tr>
        <td width="300" class="cell-avatar">
            <div class="block-area">
            <?php 
                echo Yii::t('flexiblearn', 'Role : ');
                echo Yii::t('flexiblearn', $model->role);
            ?>
            </div>
            <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->avatarPath?>" width="250" height="250" class="bor" />								
        </td>
        <td width="450" id="bg-td">
            <table width="450" cellspacing="10">
                <?php if (Yii::app()->user->getId() == $model->getPrimaryKey() || 
                        Yii::app()->user->checkAccess('adminUser')) : ?>
                    <tr>
                        <td colspan="2">
                            <?php 
                                echo CHtml::link(Yii::t('flexiblearn', 'Update Profile'), 
                                    $this->createUrl('account/update', array('id' => $model->getPrimaryKey())),
                                    array('class' => 'edit-link icon-control-link'));
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td width="150"><?php echo Yii::t('flexiblearn', $form->label($model, 'username')) ?></td>
                    <td><strong><?php echo $model->username?></strong> </td>
                </tr>
                <?php if ($model->enabledFullName) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'fullname')) ?></td>
                        <td>
                            <?php echo $model->fullname?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledDateOfBirth) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'dateOfBirth')) ?></td>
                        <td>
                            <?php echo Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"], $model->dateOfBirth)?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledAddress) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'address')) ?></td>
                        <td><?php echo $model->address?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledNationality) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'id_nationality')) ?></td>
                        <td><?php echo ($model->nationality)?$model->nationality->name:'' ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledTel) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'tel')) ?></td>
                        <td><?php echo $model->tel?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledEmail) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'email')) ?></td>
                        <td><?php echo $model->tel?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledProfession) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'id_profession')) ?></td>
                        <td><?php echo ($model->profession)?$model->profession->name:'' ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($model->enabledFavorite) : ?>
                    <tr>
                        <td><?php echo Yii::t('flexiblearn', $form->label($model, 'favorite')) ?></td>
                        <td><?php echo $model->favorite?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>            
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>