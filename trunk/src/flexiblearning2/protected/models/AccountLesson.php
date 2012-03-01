<?php

/**
 * This is the model class for table "account_lecture".
 *
 * The followings are the available columns in table 'account_lecture':
 * @property integer $id
 * @property integer $id_account
 * @property integer $id_lecture
 *
 * The followings are the available model relations:
 * @property Lecture $idLecture
 * @property Account $idAccount
 */
class AccountLesson extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return AccountLecture the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'account_lesson';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, id_account, id_lecture', 'required'),
            array('id, id_account, id_lecture', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_account, id_lecture', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idLecture' => array(self::BELONGS_TO, 'Lecture', 'id_lecture'),
            'idAccount' => array(self::BELONGS_TO, 'Account', 'id_account'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_account' => Yii::t('zii', 'Account'),
            'id_lecture' => Yii::t('zii', 'Lecture'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_account', $this->id_account);
        $criteria->compare('id_lecture', $this->id_lecture);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}