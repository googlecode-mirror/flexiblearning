<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact us',
);
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<table width="940" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption" colspan="2">
            <span id="title-text">Contact us</span>
        </td>
    </tr>
    <tr>
        <td id="bg-td">
            <div id="lienhe-left">
                <div class="top">
                    700 Do Xuan Hop P. Phuong Long B, Dis 9<br/>
                    Ho Chi Minh City, Vietnam<br/><br/>
                    Tel:     82-875-654   Fax: 82-875-654<br/>
                    Email:  lich.bui@gmail.com
                </div>
                <div style="font-weight:bold; font-size:1.1em;" class="top"> 
                    Follow us on
                </div>
                <div id="line"></div>
                <div>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-facebook-big.jpg" border="0" /></a>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-twiter-big.jpg" border="0" /></a>
                </div>
                <div class="top">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/bando.png" width="339" height="226" style="padding-bottom:50px;" />
                </div>
            </div><!--end-lienhe-left-->  	  
        </td>

        <td id="bg-td">
            <div id="lienhe-right">
                <?php if (Yii::app()->user->hasFlash('contact')): ?>
                    <div style="color: #0066ff">
                        <?php echo Yii::app()->user->getFlash('contact'); ?>
                    </div>
                <?php endif; ?>
                <table width="450" border="0">
                    <tr>
                        <td colspan="2">
                            <?php echo CHtml::errorSummary($model) ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo CHtml::activeLabel($model, 'gender'); ?><br /></td>
                        <td> <?php echo CHtml::activeLabel($model, 'name'); ?> </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $selected = 'Male';
                            $gender = array(
                                array('id' => 1, 'name' => Yii::t('zii', 'Male')),
                                array('id' => 2, 'name' => Yii::t('zii', 'Female'))
                            );
                            $list = CHtml::listData($gender, 'id', 'name');
                            echo CHtml::activeDropDownList($model, 'gender', $list);
							
                            ?>

                        </td>
                        <td>
                            <?php echo CHtml::activeTextField($model, 'name') ?>   
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><?php echo CHtml::activeLabel($model, 'email'); ?></td>
                        <td><?php echo CHtml::activeLabel($model, 'phone'); ?> </td>
                    </tr>
                    <tr>
                        <td> <?php echo CHtml::activeTextField($model, 'email') ?> </td>
                        <td> <?php echo CHtml::activeTextField($model, 'phone') ?> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td> <?php echo CHtml::activeLabel($model, 'subject'); ?></td>

                    </tr>
                    <tr>
                        <td> <?php echo CHtml::activeTextField($model, 'subject'); ?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><?php echo CHtml::activeLabel($model, 'body'); ?></td>

                    </tr>

                    <tr>
                        <td COLSPAN=2><?php echo CHtml::activeTextArea($model, 'body', array('rows' => 5, 'cols' => 35)); ?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo CHtml::submitButton(Yii::t('zii', 'SEND'), array('class' => 'bt-no-img')); ?>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>
