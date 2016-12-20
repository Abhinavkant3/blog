<?php

class m161219_104033_post extends CDbMigration
{

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable(
			'post',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id' => 'int(11) UNSIGNED NOT NULL',
				'created_at' => 'int(11)',
				'dbplus_update(relation, old, new)ed_at' => 'int(11)',
				'post_title' => 'int(100)',
				'no_of_likes' => 'int(11)',
				'no_of_comments' => 'int(11)',
				'desc' => 'int(255)',
				'status' => 'TINYINT(1)',
				'no_of_views' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);
	}

	public function safeDown()
	{
		$this->dropTable('post');
	}
	
}