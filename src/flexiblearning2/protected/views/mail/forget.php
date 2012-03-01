<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p>
    Hi <?php echo $model->username?>,
</p>
<br />
<p>
    You received this email from the site&nbsp
    <?php echo CHtml::link(Yii::app()->params['siteName'], Yii::app()->request->baseUrl)?>&nbsp;
    because there is an request forgetting password with your username and email.
</p>
<br />
<p>
    Here is your new password information: <br />
    Username : <?php echo $model->username?><br />
    Password : <?php echo $newPass?><br />
</p>
<br />
<p>
    Please login to our site with the above information. Thanks !!!
</p>
<br />
<p>
    Best regards,<br />
    <?php echo Yii::app()->params['siteName']?>
</p>

