<?php

/**
 * This is the model class for table "partner".
 *
 * The followings are the available columns in table 'partner':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $tel
 * @property string $logo_path
 * @property string $contact_link
 * @property integer $created_by
 * @property string $created_date
 * @property integer $updated_by
 * @property string $updated_date
 */
class Partner extends Base {

    public $fileLogo;

    /**
     * Returns the static model of the specified AR class.
     * @return Partner the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'partner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fileLogo', 'file', 'allowEmpty' => true,
                'types' => Yii::app()->params['imageExtionsions'],
                'maxSize' => Yii::app()->params['imageMaxSize'],
            ),
            array('email', 'email'),
            array('contact_link', 'url'),
            array('name, address, email, tel', 'required'),
            array('name, tel, logo_path, contact_link', 'length', 'max' => 256),
            array('email', 'length', 'max' => 128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, address, is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'banners' => array(self::HAS_MANY, 'Banner', 'id_partner'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('zii', 'Name'),
            'address' => Yii::t('zii', 'Address'),
            'email' => Yii::t('zii', 'Email'),
            'tel' => Yii::t('zii', 'Tel'),
            'logo_path' => Yii::t('zii', 'Logo Path'),
            'contact_link' => Yii::t('zii', 'Contact Link'),
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
        $criteria->compare('address', $this->address, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('tel', $this->tel, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function afterDelete() {
        parent::afterDelete();
        if ($this->logo_path && file_exists($this->logo_path)) {
            unlink($this->logo_path);
        }
    }

}