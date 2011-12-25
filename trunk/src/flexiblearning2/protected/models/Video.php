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
 * @property integer $flag_approve
 * @property integer $flag_del
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
            array('name, id_lesson, path', 'required'),
            array('id_lesson, num_view, ranking, flag_approve, flag_del', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('description_vi, description_en, description_ko', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, id_lesson, num_view, ranking, flag_approve, flag_del', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'documents' => array(self::HAS_MANY, 'Document', 'id_video'),
            'notifications' => array(self::HAS_MANY, 'Notification', 'id_video'),
            'surveys' => array(self::HAS_MANY, 'Survey', 'id_video'),
            'videorankings' => array(self::HAS_MANY, 'Videoranking', 'id_video'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description_vi' => 'Description vi',
            'description_en' => 'Description en',
            'description_ko' => 'Description ko',
            'id_lesson' => 'Lesson',
            'num_view' => 'Num View',
            'ranking' => 'Ranking',
            'flag_approve' => 'Approved',
            'flag_del' => 'Deleted',
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

        $criteria->compare('name', $this->name, true);
        $criteria->compare('id_lesson', $this->id_lesson);
        $criteria->compare('num_view', $this->num_view);
        $criteria->compare('ranking', $this->ranking);
        $criteria->compare('flag_approve', $this->flag_approve);
        $criteria->compare('flag_del', $this->flag_del);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}