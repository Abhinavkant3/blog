<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property string $id
 * @property string $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $post_title
 * @property integer $no_of_likes
 * @property integer $no_of_comments
 * @property integer $desc
 * @property integer $status
 * @property integer $no_of_views
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('created_at, updated_at, post_title, no_of_likes, no_of_comments, desc, status, no_of_views', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, created_at, updated_at, post_title, no_of_likes, no_of_comments, desc, status, no_of_views', 'safe', 'on'=>'search'),
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
			'users' => array(self::BELONGS_TO,'User','user_id');
			'comments' => array(self::HAS_MANY,'Comment','blog_id');
			'likes' => array(self::HAS_MANY,'Like','blog_id');

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'post_title' => 'Post Title',
			'no_of_likes' => 'No Of Likes',
			'no_of_comments' => 'No Of Comments',
			'desc' => 'Desc',
			'status' => 'Status',
			'no_of_views' => 'No Of Views',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('post_title',$this->post_title);
		$criteria->compare('no_of_likes',$this->no_of_likes);
		$criteria->compare('no_of_comments',$this->no_of_comments);
		$criteria->compare('desc',$this->desc);
		$criteria->compare('status',$this->status);
		$criteria->compare('no_of_views',$this->no_of_views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
