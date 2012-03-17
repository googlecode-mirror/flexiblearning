<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property string $subject_vi
 * @property string $subject_en
 * @property string $subject_ko
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_ko
 * @property string $document_path
 * @property integer $id_lesson
 * @property integer $is_active
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Lesson $idLesson
 */
class Document extends Base {
    public $file;
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
        return array(
             array('file', 'file', 'allowEmpty' => false,
                'types' => Yii::app()->params['documentExtensions'],
                'maxSize' => Yii::app()->params['documentMaxSize'],
                'on' => 'insert',                 
            ),
            array('file', 'file', 'allowEmpty' => true,
                'types' => Yii::app()->params['documentExtensions'],
                'maxSize' => Yii::app()->params['documentMaxSize'],
                'on' => 'update'
            ),
            array('subject_en, id_lesson, is_active', 'required'),
            array('created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('subject_vi, subject_en, subject_ko, document_path', 'length', 'max' => 256),
            array('subject_vi, subject_en, description_vi, description_en, description_ko', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('subject_vi, subject_en, subject_ko, id_lesson, created_by, created_date, updated_by, updated_date', 'safe', 'on' => 'search'),
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
            'subject_vi' => Yii::t('zii', 'Subject Vi'),
            'subject_en' => Yii::t('zii', 'Subject En'),
            'subject_ko' => Yii::t('zii', 'Subject Ko'),
            'description_vi' => Yii::t('zii', 'Description Vi'),
            'description_en' => Yii::t('zii', 'Description En'),
            'description_ko' => Yii::t('zii', 'Description Ko'),
            'document_path' => Yii::t('zii', 'Document Path'),
            'is_active' => Yii::t('zii', 'Active'),
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

        $criteria->compare('description_ko', $this->description_ko, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'id DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['nDocumentPerPage'],
                    ),
                ));
    }

}