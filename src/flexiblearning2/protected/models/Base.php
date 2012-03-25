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
            $this->updated_by = Yii::app()->user->getId();
            $this->updated_date = Yii::app()->dateFormatter->format('dd/MM/yyyy HH:mm:ss', date('Y-m-d H:i:s'));
            $updated_date = Yii::app()->dateFormatter->format('dd/MM/yyyy HH:mm:ss', date('Y-m-d H:i:s'));
            if ($this->getIsNewRecord()) {
                $this->created_date = $this->updated_date;
                $this->created_by = $this->updated_by;
            }
        }

        return parent::beforeValidate();
    }

    public function behaviors() {
        return
                array(
                    'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
                    'CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior')
        );
    }

    public function __get($name) {
        $lang = Yii::app()->getLanguage();
        $att = $name . '_' . $lang;
        if ($this->hasAttribute($att)) {
            $value = parent::__get($att);
            if (!$value) {
                $defaultLang = Yii::app()->params['defaultLanguage'];
                return parent::__get($name . '_' . $defaultLang);
            } else {
                return $value;
            }
        }

        return parent::__get($name);
    }

    public function deleteByPk($pk, $condition='', $params=array()) {
        foreach ($this->relations() as $key => $relation) {
            if ($relation[0] == self::HAS_MANY) {
                $className = $relation[1];
                $classObj = new $className;
                foreach ($classObj->model()->relations() as $keyRelation => $otherRelation) {
                    if ($otherRelation[1] == get_class($this)) {
                        if ($otherRelation[0] == self::BELONGS_TO && $otherRelation[2] == $relation[2]) {
                            foreach ($this->getRelated($key) as $obj) {
                                $obj->delete();
                            }
                        }
                        break;
                    }
                }
            }
        }
        return parent::deleteByPk($pk, $condition, $params);
    }
}