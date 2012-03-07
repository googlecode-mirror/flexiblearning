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

//    public $fileIntro;

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
//            array('fileIntro', 'file', 'allowEmpty' => false,
//                'types' => Yii::app()->params['videoExtensions'],
//                'maxSize' => Yii::app()->params['videoMaxSize'],
//                'on' => 'create'
//            ),
//            array('fileIntro', 'file', 'allowEmpty' => true,
//                'types' => Yii::app()->params['videoExtensions'],
//                'maxSize' => Yii::app()->params['videoMaxSize'],
//                'on' => 'update'
//            ),
//            array('id_category, title_en, content_en, path_video_intro, owner_by, path_video_thumbnail, fileIntro', 'required'),
            array('id_category, title_en, content_en, path_video_intro, owner_by', 'required'),
            array('id_category, owner_by, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_ko', 'length', 'max' => 256),
            array('path_video_intro, path_video_thumbnail', 'length', 'max' => 512),
            array('is_active', 'default', 'value' => 1),
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
//            'notificationLectures' => array(self::HAS_MANY, 'NotificationLecture', 'id_lecture'),
            'lessons' => array(self::HAS_MANY, 'Lesson', 'id_lecture'),
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
            'id_category' => Yii::t('zii', 'Category'),
            'title_vi' => Yii::t('zii', 'Title Vi'),
            'title_en' => Yii::t('zii', 'Title En'),
            'title_ko' => Yii::t('zii', 'Title Ko'),
            'content_vi' => Yii::t('zii', 'Content Vi'),
            'content_en' => Yii::t('zii', 'Content En'),
            'content_ko' => Yii::t('zii', 'Content Ko'),
            'path_video_intro' => Yii::t('zii', 'Video Intro'),
            'is_active' => Yii::t('zii', 'Active'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($idLanguage = null) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $is_active = $this->is_active;
        if ($idLanguage) {
            $criteria->join = 'JOIN category ON category.id = id_category';
            $criteria->condition = 'category.id_language = ' . $idLanguage;
        } 
        $criteria->compare('id_category', $this->id_category);
        $criteria->compare('title_vi', $this->title_vi, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('title_ko', $this->title_ko, true);
        $criteria->compare('t.is_active', $this->is_active);
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
    
    public function getId_language() {
        if ($this->category) {
            return $this->category->id_language;
        }
        return null;
    }

    protected function afterDelete() {
        parent::afterDelete();
        if ($this->path_video_intro && file_exists($this->path_video_intro)) {
            unlink($this->imagepath);
        }
    }
}