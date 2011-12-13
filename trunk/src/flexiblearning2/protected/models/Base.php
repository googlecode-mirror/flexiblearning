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
class Base extends CActiveRecord {

    //put your code here
    protected function beforeValidate() {
        if ($this->getIsNewRecord()) {
            $this->createdDate = new CDbExpression('NOW()');
            $this->createdBy = Yii::app()->user->id;
        }
        $this->updatedDate = new CDbExpression('NOW()');
        $this->updatedBy = Yii::app()->user->id;

        return parent::beforeValidate();
    }

    public function behaviors() {
        return array('datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior')); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }

//    protected function beforeSave(){
//        if (!parent::beforeSave()) {
//            return false;
//        }
//    }
}

?>