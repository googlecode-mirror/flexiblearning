<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $banner_link
 * @property integer $id_partner
 * @property string $ad_path
 * @property integer $is_active
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 */
class Banner extends Base {
    public $fileAd;
    
    /**
     * Returns the static model of the specified AR class.
     * @return Banner the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fileAd', 'file', 'allowEmpty' => false,
                'types' => Yii::app()->params['imageExtionsions'],
                'maxSize' => Yii::app()->params['imageMaxSize'],
                'on' => 'insert'
            ),
            array('fileAd', 'file', 'allowEmpty' => true,
                'types' => Yii::app()->params['imageExtionsions'],
                'maxSize' => Yii::app()->params['imageMaxSize'],
                'on' => 'update'
            ),
            array('banner_link', 'url'),
            array('banner_link, id_partner', 'required'),
            array('id_partner, is_active', 'numerical', 'integerOnly' => true),
            array('banner_link, ad_path', 'length', 'max' => 256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('banner_link, id_partner, is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'partner' => array(self::BELONGS_TO, 'Partner', 'id_partner'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'banner_link' => Yii::t('zii', 'Banner Link'),
            'id_partner' => Yii::t('zii', 'Partner'),
            'ad_path' => 'Ad Path',
            'is_active' => Yii::t('zii', 'Active'),
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

        $criteria->compare('banner_link', '%' . $this->banner_link . '%', true, 'AND', false);
        $criteria->compare('id_partner', $this->id_partner);
        $criteria->compare('is_active', $this->is_active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}