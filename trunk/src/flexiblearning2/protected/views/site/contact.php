<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact us',
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
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
                <table width="450" border="0">
                    <tr>
                        <td>Gender<br /></td>
                        <td>Your name </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="select">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="textfield" class="text-field" />    
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Your email?</td>
                        <td>Your phone number </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="textfield" class="text-field" /></td>
                        <td><input type="text" name="textfield" class="text-field" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea name="" cols="" rows="" style="width:420px; height:100px"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo CHtml::submitButton('SEND', array('class' => 'bt-no-img')); ?>                            
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>