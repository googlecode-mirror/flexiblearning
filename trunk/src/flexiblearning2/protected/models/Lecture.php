<?php

/**
 * This is the model class for table "lecture".
 *
 * The followings are the available columns in table 'lecture':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property integer $idCategory
 * @property integer $createdDate
 * @property integer $createdBy
 * @property integer $updatedDate
 * @property integer $updatedBy
 *
 * The followings are the available model relations:
 * @property Category $idCategory0
 * @property Lesson[] $lessons
 */
class Lecture extends Base {
//    public function init() {
//        if (empty($this->state)) {
//            $this->state = 1;            
//        }
//    }

    /**
     * Returns the static model of the specified AR class.
     * @return Lecture the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lecture';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, price, idCategory', 'required'),
            array('price, idCategory', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 256),
            array('description, thumbnail', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, price, idCategory', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'idCategory'),
            'lessons' => array(self::HAS_MANY, 'Lesson', 'idLecture'),
            'createdByUser' => array(self::BELONGS_TO, 'Account', 'createdBy'),
            'updatedByUser' => array(self::BELONGS_TO, 'Account', 'updatedBy'),
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
            'price' => 'Price',
            'idCategory' => 'Category',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
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
        $criteria->compare('price', $this->price);
        $criteria->compare('idCategory', $this->idCategory);
        $criteria->compare('state', $this->state);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getThumbnail() {
        return Yii::app()->request->baseUrl . '/' . $this->thumbnail;
    }
}