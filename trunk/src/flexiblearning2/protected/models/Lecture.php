<?php

/**
 * This is the model class for table "lecture".
 *
 * The followings are the available columns in table 'lecture':
 * @property integer $id
 * @property integer $id_category
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_ko
 * @property string $content_vi
 * @property string $content_en
 * @property string $content_ko
 * @property string $path_video_intro
 * @property string $path_video_thumbnail
 * @property integer $is_active
 * @property integer $owner_by
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property NotificationLecture[] $notificationLectures
 */
class Lecture extends Base {

    public $fileIntro;

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
            array('fileIntro', 'file', 'allowEmpty' => true),
            array('id_category, title_vi, title_en, title_ko, content_vi, content_en, content_ko, path_video_intro, owner_by, created_by, created_date, updated_by, updated_date, path_video_thumbnail', 'required'),
            array('id_category, owner_by, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_ko', 'length', 'max' => 256),
            array('path_video_intro, path_video_thumbnail', 'length', 'max' => 512),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_category, title_vi, title_en, title_ko, is_active, owner_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'notificationLectures' => array(self::HAS_MANY, 'NotificationLecture', 'id_lecture'),
            'lessons' => array(self::HAS_MANY, 'Lesson', 'id_lesson'),
            'category' => array(self::BELONGS_TO, 'Category', 'id_category'),
            'ownerBy' => array(self::BELONGS_TO, 'Account', 'owner_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_category' => 'Category',
            'title_vi' => 'Title Vi',
            'title_en' => 'Title En',
            'title_ko' => 'Title Ko',
            'content_vi' => 'Content Vi',
            'content_en' => 'Content En',
            'content_ko' => 'Content Ko',
            'path_video_intro' => 'Video Intro',
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

        $criteria->compare('id_category', $this->id_category);
        $criteria->compare('title_vi', $this->title_vi, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('title_ko', $this->title_ko, true);
        $criteria->compare('is_active', $this->is_active);
        $criteria->compare('owner_by', $this->owner_by);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getHref() {
        return Yii::app()->createUrl('lecture/view', array(
                    'id' => $this->getPrimaryKey(),
                    'name' => $this->title,
                ));
    }

}