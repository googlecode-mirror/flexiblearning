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
        if ($this->hasAttribute('created_date')) {
            if ($this->getIsNewRecord()) {
                $this->created_date = new CDbExpression('NOW()');
                $this->created_by = Yii::app()->user->getId();
            }
            $this->updated_date = new CDbExpression('NOW()');
            $this->updated_by = Yii::app()->user->getId();
        }

        return parent::beforeValidate();
    }

    public function behaviors() {
        return array('datetimeI18NBehavior' => array('class' => 'ext.DateTimeI18NBehavior')); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
    }

    public function __get($name) {
        $lang = Yii::app()->getLanguage();
        $att = $name . '_' . $lang;
        if ($this->hasAttribute($att)) {
            return parent::__get($att);    
        }
        
        return parent::__get($name);
    }
}

?>