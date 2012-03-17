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
 * @property integer $is_active
 * @property integer $approved
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Account[] $accounts
 */
class Lesson extends Base {

    public $fileThumbnail;

    public function init() {
        $this->onAfterSave = array($this, "activeLesson");
    }

    public function activeLesson($event) {
        $lesson = $event->sender;
        if ($lesson->is_active) {
            if (!Yii::app()->user->checkAccess('adminLesson')) {
                foreach ($lesson->videos as $video) {
                    if (!$video->is_active) {
                        $video->is_active = 1;
                        $video->save();
                    }
                }
                foreach ($lesson->documents as $document) {
                    if (!$document->is_active) {
                        $document->is_active = 1;
                        $document->save();
                    }
                }
            }            
        }
    }

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
            array('fileThumbnail', 'file', 'allowEmpty' => true,
                'types' => Yii::app()->params['imageExtionsions'],
                'maxSize' => Yii::app()->params['imageMaxSize']),
            array('price, id_lecture, title_en', 'required'),
            array('id_lecture', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_ko', 'length', 'max' => 50),
            array('price', 'length', 'max' => 10),
            array('is_active', 'default', 'value' => 1),
            array('description_vi, description_en, description_ko, fileThumbnail, is_active, owner_by', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title_vi, title_en, title_ko, price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'videos' => array(self::HAS_MANY, 'Video', 'id_lesson'),
            'documents' => array(self::HAS_MANY, 'Document', 'id_lesson'),
            'questions' => array(self::HAS_MANY, 'Question', 'id_lesson'),
            'accounts' => array(self::MANY_MANY, 'Account', 'lesson_account(id_lesson, id_account)'),
            'lecture' => array(self::BELONGS_TO, 'Lecture', 'id_lecture'),
            'ownerBy' => array(self::BELONGS_TO, 'Account', 'owner_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title_vi' => Yii::t('zii', 'Title Vi'),
            'title_en' => Yii::t('zii', 'Title En'),
            'title_ko' => Yii::t('zii', 'Title Ko'),
            'description_vi' => Yii::t('zii', 'Description Vi'),
            'description_en' => Yii::t('zii', 'Description En'),
            'description_ko' => Yii::t('zii', 'Description Ko'),
            'price' => Yii::t('zii', 'Price'),
            'approve' => Yii::t('zii', 'Approve'),
            'id_category' => Yii::t('zii', 'Category'),
            'id_lecture' => Yii::t('zii', 'Lecture'),
            'fileThumbnail' => Yii::t('zii', 'Thumbnail'),
            'is_active' => Yii::t('zii', 'Active')
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($idCategory = null, $idLanguage = null) {
        $criteria = new CDbCriteria;

        if ($idCategory) {
            $criteria->join = 'JOIN lecture ON lecture.id = id_lecture';
            $criteria->condition = 'lecture.id_category = ' . $idCategory;
        } else {
            if ($idLanguage) {
                $criteria->join = 'JOIN lecture ON lecture.id = id_lecture ' .
                        'JOIN category ON category.id = lecture.id_category';
                $criteria->condition = 'category.id_language = ' . $idLanguage;
            } else {
                $criteria->compare('t.id_lecture', $this->id_lecture);
            }
        }

        $criteria->compare('title_vi', $this->title_vi, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('title_ko', $this->title_ko, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('t.is_active', $this->is_active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->params['nLessonPerPage'],
            ),
        ));
    }

    public function getHref($id = null) {
        $url = Yii::app()->createUrl('lesson/view', array(
            'id' => $this->getPrimaryKey(),
            'title' => $this->title,
        ));
        if (!empty($id)) {
            $url .= '#' . $id;
        }
        
        return $url;
    }

    public function getThumb() {
        $thumbnail = $this->thumbnail;
        if (!$thumbnail) {
            $thumbnail = Yii::app()->params['defaultLessonThumbnail'];
        }
        return $thumbnail;
    }

    public function getId_category() {
        if ($this->lecture) {
            return $this->lecture->id_category;
        }
        return null;
    }

    public function getId_language() {
        if ($this->lecture) {
            return $this->lecture->category->id_language;
        }
        return null;
    }

    protected function afterDelete() {
        parent::afterDelete();
        if ($this->thumbnail && file_exists($this->thumbnail)) {
            unlink($this->thumbnail);
        }
    }

    public function isBoughtBuy($accountId) {
        $model = AccountLesson::model()->findByAttributes(array('id_account' => $accountId, 'id_lesson' => $this->getPrimaryKey()));
        return $model != true;
    }

}