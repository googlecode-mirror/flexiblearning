<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property integer $id_lesson
 * @property integer $id_account
 * @property string $content
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 * @property string $username
 */
class Question extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return Question the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_lesson, id_account, content, created_by, created_date, updated_by, updated_date, username', 'required'),
            array('id_lesson, id_account, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_lesson, id_account, content, created_by, created_date, updated_by, updated_date, username', 'safe', 'on' => 'search'),
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
            'account' => array(self::BELONGS_TO, 'Account', 'id_account'),
            'answers' => array(self::HAS_MANY, 'Answer', 'id_question'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_lesson' => 'Id Lesson',
            'id_account' => 'Id Account',
            'content' => 'Content',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'username' => 'Username',
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
        $criteria->compare('id_lesson', $this->id_lesson);
        $criteria->compare('id_account', $this->id_account);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('updated_by', $this->updated_by);
        $criteria->compare('updated_date', $this->updated_date, true);
        $criteria->compare('username', $this->username, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}