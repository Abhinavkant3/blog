<?php

 /* @property string $id
 /* @property string $user_id
 /* @property integer $created_at
 /* @property integer $updated_at
 /* @property integer $post_title
 /* @property integer $no_of_likes
 /* @property integer $no_of_comments
 /* @property integer $desc
 /* @property integer $status
 /* @property integer $no_of_views
 */
 class Post extends CActiveRecord
 {

 	public static function model($className=__CLASS__) {
 		return parent::model($className);
 	}

 	public function tableName() {
 		return 'post';
 	}

 	public function rules() {
 		return array(
 			array('user_id', 'required'),
 			array('created_at, updated_at, post_title, no_of_likes, no_of_comments, desc, status, no_of_views', 'numerical', 'integerOnly'=>true),
 			array('user_id', 'length', 'max'=>11),
 			);
 	}

 	public function relations() {
 		return array(
 			'users' => array(self::BELONGS_TO,'User','user_id'),
 			'comments' => array(self::HAS_MANY,'Comment','blog_id'),
 			'likes' => array(self::HAS_MANY,'Like','blog_id'),
 			);
 	}

 	public function beforeSave() {
 		if($this->isNewRecord) { 
 			$this->created_at = time();
 		}
 		$this->updated_at = time();
 		return parent::beforeSave();
 	}

 	public function updateColumns($column_value_array) {
 		$column_value_array['updated_at'] = time();
 		foreach($column_value_array as $column_name => $column_value)
 			$this->$column_name = $column_value;
 		$this->update(array_keys($column_value_array));
 	}

 	public static function create($attributes) {
 		$model = new Post;
 		$model->attributes = $attributes;
 		$model->save();
 		return $model;
 	}
 }