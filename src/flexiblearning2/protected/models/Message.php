<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $from_id
 */
class Message extends Base {
    public $toUsers;
    
    /**
     * Returns the static model of the specified AR class.
     * @return Message the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'message';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_from', 'required'),
            array('id_from', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'fromUser' => array(self::BELONGS_TO, 'Account', 'id_from'),
            'toUser' => array(self::BELONGS_TO, 'Account', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'from_id' => 'From',
            'toUsers' => 'To Users'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('from_id', $this->from_id);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getDisplaySubject() {
        $subject = $this->subject;
        if (empty($subject)) {
            $subject = Yii::t('flexiblearn', '(No Subject)');
        }
        return $subject;
    }

    public function getHref() {
        return Yii::app()->createUrl('message/view', array(
                    'id' => $this->getPrimaryKey(),
                ));
    }

}