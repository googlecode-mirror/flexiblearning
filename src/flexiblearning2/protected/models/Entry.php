<?php

/**
 * This is the model class for table "entry".
 *
 * The followings are the available columns in table 'entry':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $imagepath
 * @property integer $owner_by
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 *
 * The followings are the available model relations:
 * @property Account $ownerBy
 */
class Entry extends Base {

    public $fileThumbnail;

    /**
     * Returns the static model of the specified AR class.
     * @return Entry the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'entry';
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
                'maxSize' => Yii::app()->params['imageMaxSize']
            ),
            array('title, content, owner_by, created_by, created_date, updated_by, updated_date', 'required'),
            array('owner_by, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 256),
            array('imagepath', 'length', 'max' => 512),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title, owner_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ownerBy' => array(self::BELONGS_TO, 'Account', 'owner_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'full' => 'Owner By',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'fileThumbnail' => 'Image',
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

        $criteria->compare('title', $this->title, true);
        $criteria->compare('owner_by', $this->owner_by);
        $criteria->order = 'created_date desc';

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getThumbnailPath() {
        $thumbnailPath = $this->imagepath;
        if (!$thumbnailPath) {
            return Yii::app()->params['defaultEntryThumbnail'];
        }
        return $thumbnailPath;
    }

    public function getHref() {
        return Yii::app()->createUrl('entry/view', array(
                    'id' => $this->getPrimaryKey(),
                    'title' => $this->title,
                ));
    }

    protected function afterDelete() {
        parent::afterDelete();
        if ($this->imagepath && file_exists($this->imagepath)) {
            unlink($this->imagepath);
        }
    }
}