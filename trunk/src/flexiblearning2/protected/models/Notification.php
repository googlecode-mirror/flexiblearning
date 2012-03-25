<?php

/**
 * This is the model class for table "Notification".
 *
 * The followings are the available columns in table 'Notification':
 * @property integer $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_korean
 * @property string $content_vi
 * @property string $content_en
 * @property string $content_korean
 * @property integer $id_lesson
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 */
class Notification extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return Notification the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notification';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title_vi, title_en, title_korean, id_lesson', 'required'),
            array('id_lesson', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_korean', 'length', 'max' => 256),
            array('content_vi, content_en, content_korean', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title_vi, title_en, title_korean, id_lesson, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'lesson' => array(self::BELONGS_TO, 'Lesson', 'id_lesson'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title_vi' => Yii::t('flexiblearn', 'Title Vi'),
            'title_en' => Yii::t('flexiblearn', 'Title En'),
            'title_korean' => Yii::t('flexiblearn', 'Title Korean'),
            'content_vi' => Yii::t('flexiblearn', 'Content Vi'),
            'content_en' => Yii::t('flexiblearn', 'Content En'),
            'content_korean' => Yii::t('flexiblearn', 'Content Korean'),
            'id_lesson' => Yii::t('flexiblearn', 'Lesson'),
            'created_by' => Yii::t('flexiblearn', 'Created By'),
            'created_date' => Yii::t('flexiblearn', 'Created Date'),
            'updated_by' => Yii::t('flexiblearn', 'Updated By'),
            'updated_date' => Yii::t('flexiblearn', 'Updated Date'),
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
        $criteria->compare('title_korean', $this->title_korean, true);
        $criteria->compare('id_lesson', $this->id_lesson);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('updated_date', $this->updated_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}