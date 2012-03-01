<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property string $subject_vi
 * @property string $subject_en
 * @property string $subject_ko
 * @property string $filename
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_ko
 * @property string $document_path
 * @property integer $flag_del
 * @property integer $flag_approve
 * @property integer $id_lesson
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Lesson $idLesson
 */
class Document extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Document the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'document';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, subject_vi, subject_en, subject_ko, filename, document_path, id_lesson, created_by, created_date, updated_by, updated_date', 'required'),
            array('id, flag_del, flag_approve, id_lesson, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('subject_vi, subject_en, subject_ko, filename, document_path', 'length', 'max' => 256),
            array('description_vi, description_en, description_ko', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, subject_vi, subject_en, subject_ko, filename, description_vi, description_en, description_ko, document_path, flag_del, flag_approve, id_lesson, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idLesson' => array(self::BELONGS_TO, 'Lesson', 'id_lesson'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'subject_vi' => Yii::t('zii', 'Subject Vi'),
            'subject_en' => Yii::t('zii', 'Subject En'),
            'subject_ko' => Yii::t('zii', 'Subject Ko'),
            'filename' => Yii::t('zii', 'Filename'),
            'description_vi' => Yii::t('zii', 'Description Vi'),
            'description_en' => Yii::t('zii', 'Description En'),
            'description_ko' => Yii::t('zii', 'Description Ko'),
            'document_path' => Yii::t('zii', 'Document Path'),
            'flag_del' => Yii::t('zii', 'Flag Del'),
            'flag_approve' => Yii::t('zii', 'Approve'),
            'id_lesson' => Yii::t('zii', 'Lesson'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('subject_vi', $this->subject_vi, true);
        $criteria->compare('subject_en', $this->subject_en, true);
        $criteria->compare('subject_ko', $this->subject_ko, true);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('description_vi', $this->description_vi, true);
        $criteria->compare('description_en', $this->description_en, true);
        $criteria->compare('description_ko', $this->description_ko, true);
        $criteria->compare('document_path', $this->document_path, true);
        $criteria->compare('flag_del', $this->flag_del);
        $criteria->compare('flag_approve', $this->flag_approve);
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