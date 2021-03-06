<?php

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property integer $id
 * @property integer $id_question
 * @property integer $id_account
 * @property string $content
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 */
class Answer extends Base {

    /**
     * Returns the static model of the specified AR class.
     * @return Answer the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'answer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_question, id_account, content', 'required'),
            array('id_question, id_account', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_question, id_account, content', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'question' => array(self::BELONGS_TO, 'Question', 'id_question'),
            'account' => array(self::BELONGS_TO, 'Account', 'id_account'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_question' => Yii::t('flexiblearn', 'Question'),
            'id_account' => Yii::t('flexiblearn', 'Account'),
            'content' => Yii::t('flexiblearn', 'Content'),
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

        $criteria->compare('id_question', $this->id_question);
        $criteria->compare('id_account', $this->id_account);
        $criteria->compare('content', $this->content, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}