<?php

 /* @property string $id
 /* @property string $user_id
 /* @property integer $blog_id
 /* @property integer $created_at
 /* @property integer $updated_at
 /* @property integer $comment_description
 /* @property integer $status
 */
 class Comment extends CActiveRecord
 {

 	public static function model($className=__CLASS__) {
 		return parent::model($className);
 	}

 	public function tableName() {
 		return 'comment';
 	}

 	public function rules() {
 		return array(
 			array('user_id', 'required'),
 			array('blog_id, created_at, updated_at, status', 'numerical', 'integerOnly'=>true),
 			array('comment_description', 'safe'),
 			array('user_id', 'length', 'max'=>11),
 		);
 	}

 	public function relations() {
 		return array(
 			'users' => array(self::BELONGS_TO,'User','user_id'),
 			'posts' => array(self::BELONGS_TO,'Post','blog_id'),
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
 		$model = new Comment;
 		$model->attributes = $attributes;
 		$model->save();
 		return $model;
 	}
 }