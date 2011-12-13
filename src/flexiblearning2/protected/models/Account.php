<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id
 * @property string $fullname
 * @property string $dateOfBirth
 * @property string $address
 * @property integer $idNationality
 * @property string $tel
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $idProfession
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
            array('fullname, dateOfBirth, address, idNationality, email, username, password, idProfession, idRole', 'required'),
            array('idNationality, idProfession, idRole, lastLoginDate', 'numerical', 'integerOnly' => true),
            array('fullname, address, tel, password, avatar', 'length', 'max' => 256),
            array('email, username', 'length', 'max' => 128),
            array('email, username', 'unique'),
            array('dateOfBirth', 'date', 'format' => Yii::app()->params['dateFormat']),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, fullname, dateOfBirth, address, idNationality, tel, email, username, password, idProfession, avatar, idRole, state, enabledFullName, enabledDateOfBirth, enabledAddress, enabledNationality, enabledTel, enabledEmail, enabledProfession, enabledFavorite', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'role' => array(self::BELONGS_TO, 'Role', 'idRole'),
            'nationality' => array(self::BELONGS_TO, 'Nationality', 'idNationality'),
            'profession' => array(self::BELONGS_TO, 'Profession', 'idProfession'),
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
            'idNationality' => 'Nationality',
            'tel' => 'Tel',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'idProfession' => 'Id Profession',
            'avatar' => 'Avatar',
            'idRole' => 'Id Role',
            'state' => 'State',
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

        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('dateOfBirth', $this->dateOfBirth);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('idNationality', $this->idNationality);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('idProfession', $this->idProfession);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('idRole', $this->idRole);
        $criteria->compare('state', $this->state);

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

}