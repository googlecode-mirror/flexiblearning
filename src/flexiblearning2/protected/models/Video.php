<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $name
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_ko
 * @property integer $id_lesson
 * @property integer $num_view
 * @property integer $ranking
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Document[] $documents
 * @property Notification[] $notifications
 * @property Survey[] $surveys
 * @property Videoranking[] $videorankings
 */
class Video extends Base {

    public $file;

    /**
     * Returns the static model of the specified AR class.
     * @return Video the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'video';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('file', 'file', 'allowEmpty' => false,
                'types' => Yii::app()->params['videoExtensions'],
                'maxSize' => Yii::app()->params['videoMaxSize'],
                'on' => 'insert'
            ),
            array('file', 'file', 'allowEmpty' => true,
                'types' => Yii::app()->params['videoExtensions'],
                'maxSize' => Yii::app()->params['videoMaxSize'],
                'on' => 'update'
            ),
            array('name, id_lesson, path, path_video_thumbnail', 'required'),
            array('id_lesson, num_view, ranking, is_active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('description_vi, description_en, description_ko', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, id_lesson, num_view, ranking, is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
//            'documents' => array(self::HAS_MANY, 'Document', 'id_video'),
//            'notifications' => array(self::HAS_MANY, 'Notification', 'id_video'),
//            'surveys' => array(self::HAS_MANY, 'Survey', 'id_video'),
//            'videorankings' => array(self::HAS_MANY, 'Videoranking', 'id_video'),
            'lesson' => array(self::BELONGS_TO, 'Lesson', 'id_lesson'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('flexiblearn', 'Name'),
            'description_vi' => Yii::t('flexiblearn', 'Description Vi'),
            'description_en' => Yii::t('flexiblearn', 'Description En'),
            'description_ko' => Yii::t('flexiblearn', 'Description Ko'),
            'id_lesson' => Yii::t('flexiblearn', 'Lesson'),
            'num_view' => Yii::t('flexiblearn', 'Num View'),
            'ranking' => Yii::t('flexiblearn', 'Ranking'),
            'is_active' => Yii::t('flexiblearn', 'Active'),
            'file' => Yii::t('flexiblearn', 'Video file'),
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
        $criteria->compare('id_lesson', $this->id_lesson);
        $criteria->compare('num_view', $this->num_view);
        $criteria->compare('ranking', $this->ranking);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getHref() {
        return Yii::app()->createUrl('video/view', array(
                    'id' => $this->getPrimaryKey(),
                    'name' => $this->name,
                ));
    }

    protected function afterDelete() {
        parent::afterDelete();
        if (file_exists($this->path)) {
            unlink($this->path);
        }
        if (file_exists($this->path_video_thumbnail)) {
            unlink($this->path_video_thumbnail);
        }
    }

}