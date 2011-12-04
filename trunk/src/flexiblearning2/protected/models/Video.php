<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $numView
 * @property integer $ranking
 * @property integer $numRanking
 * @property integer $price
 * @property integer $idLesson
 * @property integer $state
 * @property integer $ownerBy
 * @property integer $approved
 * @property integer $videoPath
 * @property integer $thumbnailPath
 * @property integer $createdDate
 * @property integer $createdBy
 * @property integer $updatedDate
 * @property integer $updatedBy
 *
 * The followings are the available model relations:
 * @property Lesson $idLesson0
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, numView, ranking, numRanking, idLesson, state, ownerBy, approved, createdDate, createdBy, updatedDate, updatedBy', 'required'),
			array('numView, ranking, numRanking, price, idLesson, state, ownerBy, approved, videoPath, thumbnailPath, createdDate, createdBy, updatedDate, updatedBy', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, numView, ranking, numRanking, price, idLesson, state, ownerBy, approved, videoPath, thumbnailPath, createdDate, createdBy, updatedDate, updatedBy', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idLesson0' => array(self::BELONGS_TO, 'Lesson', 'idLesson'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'numView' => 'Num View',
			'ranking' => 'Ranking',
			'numRanking' => 'Num Ranking',
			'price' => 'Price',
			'idLesson' => 'Id Lesson',
			'state' => 'State',
			'ownerBy' => 'Owner By',
			'approved' => 'Approved',
			'videoPath' => 'Video Path',
			'thumbnailPath' => 'Thumbnail Path',
			'createdDate' => 'Created Date',
			'createdBy' => 'Created By',
			'updatedDate' => 'Updated Date',
			'updatedBy' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('numView',$this->numView);
		$criteria->compare('ranking',$this->ranking);
		$criteria->compare('numRanking',$this->numRanking);
		$criteria->compare('price',$this->price);
		$criteria->compare('idLesson',$this->idLesson);
		$criteria->compare('state',$this->state);
		$criteria->compare('ownerBy',$this->ownerBy);
		$criteria->compare('approved',$this->approved);
		$criteria->compare('videoPath',$this->videoPath);
		$criteria->compare('thumbnailPath',$this->thumbnailPath);
		$criteria->compare('createdDate',$this->createdDate);
		$criteria->compare('createdBy',$this->createdBy);
		$criteria->compare('updatedDate',$this->updatedDate);
		$criteria->compare('updatedBy',$this->updatedBy);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}