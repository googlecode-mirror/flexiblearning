<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id
 * @property string $fullname
 * @property integer $dateOfBirth
 * @property string $address
 * @property integer $idNationality
 * @property string $tel
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $idProfession
 * @property string $favorite
 * @property string $avatar
 * @property integer $idRole
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
 * @property integer $lastLoginDate
 * @property string $ipAddress
 *
 * The followings are the available model relations:
 * @property Role $idRole0
 * @property Nationality $idNationality0
 * @property Profession $idProfession0
 */
class Account extends CActiveRecord {

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
            array('fullname, dateOfBirth, address, idNationality, email, username, password, idProfession, favorite, idRole, state, createdDate, createdBy, updatedDate, updatedBy', 'required'),
            array('dateOfBirth, idNationality, idProfession, idRole, state, enabledFullName, enabledDateOfBirth, enabledAddress, enabledNationality, enabledTel, enabledEmail, enabledProfession, enabledFavorite, createdDate, createdBy, updatedDate, updatedBy, lastLoginDate', 'numerical', 'integerOnly' => true),
            array('fullname, address, tel, password, avatar', 'length', 'max' => 256),
            array('email, username', 'length', 'max' => 128),
            array('favorite', 'length', 'max' => 200),
            array('ipAddress', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, dateOfBirth, address, idNationality, tel, email, username, password, idProfession, favorite, avatar, idRole, state, enabledFullName, enabledDateOfBirth, enabledAddress, enabledNationality, enabledTel, enabledEmail, enabledProfession, enabledFavorite, createdDate, createdBy, updatedDate, updatedBy, lastLoginDate, ipAddress', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idRole0' => array(self::BELONGS_TO, 'Role', 'idRole'),
            'idNationality0' => array(self::BELONGS_TO, 'Nationality', 'idNationality'),
            'idProfession0' => array(self::BELONGS_TO, 'Profession', 'idProfession'),
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
            'idNationality' => 'Id Nationality',
            'tel' => 'Tel',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'idProfession' => 'Id Profession',
            'favorite' => 'Favorite',
            'avatar' => 'Avatar',
            'idRole' => 'Id Role',
            'state' => 'State',
            'enabledFullName' => 'Enabled Full Name',
            'enabledDateOfBirth' => 'Enabled Date Of Birth',
            'enabledAddress' => 'Enabled Address',
            'enabledNationality' => 'Enabled Nationality',
            'enabledTel' => 'Enabled Tel',
            'enabledEmail' => 'Enabled Email',
            'enabledProfession' => 'Enabled Profession',
            'enabledFavorite' => 'Enabled Favorite',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
            'lastLoginDate' => 'Last Login Date',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('dateOfBirth', $this->dateOfBirth);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('idNationality', $this->idNationality);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('idProfession', $this->idProfession);
        $criteria->compare('favorite', $this->favorite, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('idRole', $this->idRole);
        $criteria->compare('state', $this->state);
        $criteria->compare('enabledFullName', $this->enabledFullName);
        $criteria->compare('enabledDateOfBirth', $this->enabledDateOfBirth);
        $criteria->compare('enabledAddress', $this->enabledAddress);
        $criteria->compare('enabledNationality', $this->enabledNationality);
        $criteria->compare('enabledTel', $this->enabledTel);
        $criteria->compare('enabledEmail', $this->enabledEmail);
        $criteria->compare('enabledProfession', $this->enabledProfession);
        $criteria->compare('enabledFavorite', $this->enabledFavorite);
        $criteria->compare('createdDate', $this->createdDate);
        $criteria->compare('createdBy', $this->createdBy);
        $criteria->compare('updatedDate', $this->updatedDate);
        $criteria->compare('updatedBy', $this->updatedBy);
        $criteria->compare('lastLoginDate', $this->lastLoginDate);
        $criteria->compare('ipAddress', $this->ipAddress, true);

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
}