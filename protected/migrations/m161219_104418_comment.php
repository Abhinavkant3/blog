<?php

class m161219_104418_comment extends CDbMigration
{
	

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable(
			'comment',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id' => 'int(11) UNSIGNED NOT NULL',
				'blog_id' => 'int (11)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'comment_description' => 'int(255)',
				'status' => 'TINYINT(1)',
				'PRIMARY KEY (id)',
				),
			'ENGINE=InnoDB'
			);
	}

	public function safeDown()
	{
		$this->dropTable('comment');
	}
	
}