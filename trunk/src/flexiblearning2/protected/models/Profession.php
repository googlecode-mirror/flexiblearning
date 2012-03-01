<?php

/**
 * This is the model class for table "profession".
 *
 * The followings are the available columns in table 'profession':
 * @property integer $id
 * @property string $name
 * @property integer $state
 * @property integer $createdDate
 * @property integer $createdBy
 * @property integer $updatedDate
 * @property integer $updatedBy
 *
 * The followings are the available model relations:
 * @property Account[] $accounts
 */
class Profession extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return Profession the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'profession';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, state, createdDate, createdBy, updatedDate, updatedBy', 'required'),
            array('state, createdDate, createdBy, updatedDate, updatedBy', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, state, createdDate, createdBy, updatedDate, updatedBy', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'accounts' => array(self::HAS_MANY, 'Account', 'idProfession'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('zii', 'Name'),
            'state' => Yii::t('zii', 'State'),
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

        $criteria->compare('name', $this->name, true);
        $criteria->compare('state', $this->state);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}