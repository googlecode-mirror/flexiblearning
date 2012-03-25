<?php

/**
 * This is the model class for table "notification_lecture".
 *
 * The followings are the available columns in table 'notification_lecture':
 * @property integer $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_ko
 * @property string $content_vi
 * @property string $content_en
 * @property string $content_ko
 * @property integer $id_lecture
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 */
class NotificationLecture extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return NotificationLecture the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notification_lecture';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_lecture', 'required'),
            array('id_lecture', 'numerical', 'integerOnly' => true),
            array('title_vi, title_en, title_ko', 'length', 'max' => 256),
            array('content_vi, content_en, content_ko', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title_vi, title_en, title_ko, id_lecture, created_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'lecture' => array(self::BELONGS_TO, 'Lecture', 'id_lecture'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    /*public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title_vi' => Yii::t('flexiblearn', 'Title Vi'),
            'title_en' => Yii::t('flexiblearn', 'Title En'),
            'title_ko' => Yii::t('flexiblearn', 'Title Ko'),
            'content_vi' => Yii::t('flexiblearn', 'Content Vi'),
            'content_en' => Yii::t('flexiblearn', 'Content En'),
            'content_ko' => Yii::t('flexiblearn', 'Content Ko'),
            'id_lecture' => Yii::t('flexiblearn', 'Lecture'),
            'created_by' => Yii::t('flexiblearn', 'Created By'),
            'created_date' => Yii::t('flexiblearn', 'Created Date'),
            'updated_by' => Yii::t('flexiblearn', 'Updated By'),
            'updated_date' => Yii::t('flexiblearn', 'Updated Date'),
        );
    }*/

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
        $criteria->compare('id_lecture', $this->id_lecture);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('updated_date', $this->updated_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getTitleAndDate() {        
        $title = $this->title;
        $date = Yii::app()->dateFormatter->format(Yii::app()->params["dateFormat"], $this->created_date);
        if ($title && $date) {
            return $title . '(' . $date . ')';
        }        
    }
}