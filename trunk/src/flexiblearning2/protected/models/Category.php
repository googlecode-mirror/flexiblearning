<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $idLanguage
 * @property integer $state
 * @property integer $createdDate
 * @property integer $createdBy
 * @property integer $updatedDate
 * @property integer $updatedBy
 *
 * The followings are the available model relations:
 * @property Language $idLanguage0
 * @property Lecture[] $lectures
 */
class Category extends Base {

    public function init() {
        if (empty($this->state)) {
            $this->state = 1;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Category the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, idLanguage', 'required'),
            array('name', 'length', 'max' => 256),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, idLanguage', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'language' => array(self::BELONGS_TO, 'Language', 'idLanguage'),
            'createdByUser' => array(self::BELONGS_TO, 'Account', 'createdBy'),
            'updatedByUser' => array(self::BELONGS_TO, 'Account', 'updatedBy'),
            'lectures' => array(self::HAS_MANY, 'Lecture', 'idCategory'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'state' => 'State',
            'idLanguage' => 'Language'
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
        $criteria->compare('description', $this->description, true);
        $criteria->compare('idLanguage', $this->idLanguage);
        $criteria->compare('state', $this->state);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}