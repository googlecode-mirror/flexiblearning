<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Base
 *
 * @author haidang
 */
class Base extends CActiveRecord 
{
    //put your code here
    protected function beforeValidate() 
    {
        if ($this->getIsNewRecord()) {
            $this->createdDate = time();
            $this->createdBy = Yii::app()->user->id;
        }
        $this->updatedDate = time();
        $this->updatedBy = Yii::app()->user->id;
        
        return parent::beforeValidate();
    }

}

?>
