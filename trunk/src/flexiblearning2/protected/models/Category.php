<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_ko
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_ko
 * @property integer $id_language
 * @property boolean $is_active
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Language $idLanguage
 * @property Lesson[] $lessons
 */
class Category extends Base {

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
            array('name_en, id_language', 'required'),
            array('id_language', 'numerical', 'integerOnly' => true),
            array('name_vi, name_en, name_ko', 'length', 'max' => 50),
            array('description_vi, description_en, description_ko, is_active', 'safe'),
            array('is_active', 'default', 'value' => 1),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name_vi, name_en, name_ko, id_language, is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'language' => array(self::BELONGS_TO, 'Language', 'id_language'),
            'lectures' => array(self::HAS_MANY, 'Lecture', 'id_category'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name_vi' => 'Name Vi',
            'name_en' => 'Name En',
            'name_ko' => 'Name Ko',
            'description_vi' => 'Description Vi',
            'description_en' => 'Description En',
            'description_ko' => 'Description Ko',
            'id_language' => 'Language',
            'is_active' => 'Active',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
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

        $criteria->compare('id_language', $this->id_language);
        $criteria->compare('is_active', $this->is_active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

//    protected function beforeValidate() {
//        if ($this->getIsNewRecord()) {
//            $this->is_active = 1;
//        }
//        return parent::beforeValidate();
//    }

    public function getHref() {
        return Yii::app()->createUrl('category/view', array(
                    'id' => $this->getPrimaryKey(),
                    'name' => $this->name,
                ));
    }

//    public function init() {
//        $field = array();
//        foreach ($this->rules() as $chunk) {
//            if ($chunk[1] === 'default') {
//                $params = array_slice($chunk, 2);
//                $validator = CValidator::createValidator($chunk[1], self::model(), $chunk[0], $params);
//                $validator->validate($this);
//            }
//        }
//    }
}