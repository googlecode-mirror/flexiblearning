<?php

/**
 * This is the model class for table "lesson".
 *
 * The followings are the available columns in table 'lesson':
 * @property integer $id
 * @property string $title_vn
 * @property string $title_en
 * @property string $title_ko
 * @property string $description_vn
 * @property string $description_en
 * @property string $description_ko
 * @property string $price
 * @property integer $flag_del
 * @property integer $flag_approve
 * @property integer $id_category
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Category $idCategory
 * @property Account[] $accounts
 */
class Lesson extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return Lesson the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lesson';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('price, id_category, title_en', 'required'),
            array('flag_del, flag_approve, id_category', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_ko', 'length', 'max' => 50),
            array('price', 'length', 'max' => 10),
            array('description_vi, description_en, description_ko, fileThumbnail', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title_vi, title_en, title_ko, price, flag_del, flag_approve, id_category', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'id_category'),
            'videos' => array(self::HAS_MANY, 'Video', 'id_lesson'),
            'accounts' => array(self::MANY_MANY, 'Account', 'lesson_account(id_lesson, id_account)'),
            'createdBy' => array(self::BELONGS_TO, 'Account', 'created_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title_vi' => 'Title Vi',
            'title_en' => 'Title En',
            'title_ko' => 'Title Ko',
            'description_vi' => 'Description Vi',
            'description_en' => 'Description En',
            'description_ko' => 'Description Ko',
            'price' => 'Price',
            'flag_del' => 'Flag Del',
            'flag_approve' => 'Flag Approve',
            'id_category' => 'Category',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'thumbnail' => 'Thumbnail',
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

        $criteria->compare('title_vi', $this->title_vi, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('title_ko', $this->title_ko, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('flag_del', $this->flag_del);
        $criteria->compare('flag_approve', $this->flag_approve);
        $criteria->compare('id_category', $this->id_category);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function getHref() {
        return Yii::app()->createUrl('lesson/view', array(
            'id'=>$this->getPrimaryKey(),
            'title'=>$this->title,
        ));
    }
}