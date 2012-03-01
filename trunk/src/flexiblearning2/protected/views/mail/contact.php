<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p>
    Hi,
</p>
<br />
<p>
    There is a new contact in <?php echo CHtml::link('our site', Yii::app()->request->baseUrl)?>&nbsp;with this following information <br />    
</p>
<p>
    Name : <?php echo $model->name?><br />
    Gender : <?php echo $model->gender?"Mail":"Female"?><br />
    Phone : <?php echo $model->phone?><br />
    Email : <?php echo $model->email?><br />
</p>
<p>
    The following message of this contact is : 
</p>
<p>
    "<?php echo $model->subject?><br />
    <?php echo $model->body?>"
</p>
<br />
<p>
    Best regards,<br />
    <?php echo Yii::app()->params['siteName']?>
</p>
