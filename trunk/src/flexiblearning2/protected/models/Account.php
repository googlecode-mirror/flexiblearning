<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id
 * @property string $fullname
 * @property string $dateOfBirth
 * @property string $address
 * @property integer $id_nationality
 * @property string $tel
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $id_profession
 * @property string $avatar
 
 * @property integer $state
 * @property integer $enabledFullName
 * @property integer $enabledDateOfBirth
 * @property integer $enabledAddress
 * @property integer $enabledNationality
 * @property integer $enabledTel
 * @property integer $enabledEmail
 * @property integer $enabledProfession
 * @property integer $enabledFavorite
 * @property integer $createdDate
 * @property integer $createdBy
 * @property integer $updatedDate
 * @property integer $updatedBy
 * @property integer $last_login
 * @property string $ipAddress
 *
 * The followings are the available model relations:
 * @property Role $idRole0
 * @property Nationality $id_nationality0
 * @property Profession $id_profession0
 */
class Account extends Base {

    public $password_repeat;

    /**
     * Returns the static model of the specified AR class.
     * @return Account the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'account';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(

            array('fullname, dateOfBirth, address, id_nationality, email, username, password, id_profession', 'required'),
            array('id_nationality, id_profession, last_login', 'numerical', 'integerOnly' => true),

            array('fullname, address, tel, password, avatar', 'length', 'max' => 256),
            array('email, username', 'length', 'max' => 128),
            array('email, username', 'unique'),
            array('dateOfBirth', 'date', 'format' => Yii::app()->params['dateFormat']),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.

            array('id, fullname, dateOfBirth, address, id_nationality, tel, email, username, password, id_profession, avatar, flag_del, enabledFullName, enabledDateOfBirth, enabledAddress, enabledNationality, enabledTel, enabledEmail, enabledProfession, enabledFavorite', 'safe', 'on' => 'search'),

        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nationality' => array(self::BELONGS_TO, 'Nationality', 'id_nationality'),
            'profession' => array(self::BELONGS_TO, 'Profession', 'id_profession'),
            'entries' => array(self::HAS_MANY, 'Entry', 'owner_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'fullname' => 'Fullname',
            'dateOfBirth' => 'Date Of Birth',
            'address' => 'Address',
            'id_nationality' => 'Nationality',
            'tel' => 'Tel',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'id_profession' => 'Profession',
            'avatar' => 'Avatar',
            'flag_del' => 'Flag_del',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
            'last_login' => 'Last Login Date',
            'ipAddress' => 'Ip Address',
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

        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('dateOfBirth', $this->dateOfBirth);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('id_nationality', $this->id_nationality);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('id_profession', $this->id_profession);
        $criteria->compare('avatar', $this->avatar, true);
       
        $criteria->compare('flag_del', $this->flag_del);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }

    public function hashPassword($password) {
        return md5($password);
    }

    protected function afterValidate() {
        parent::afterValidate();
        $this->password = $this->hashPassword($this->password);
    }

    public function getHref() {
        return Yii::app()->createUrl('account/view', array(
            'id'=>$this->getPrimaryKey(),
            'username'=>$this->username,
        ));
    }
    
    public function getAvatarPath() {
        $avatar = $this->avatar;
        if (!$avatar) {
            return Yii::app()->params['defaultUserAvatar'];
        }
        return $avatar;
    }
}