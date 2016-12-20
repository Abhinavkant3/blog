<?php

class m161219_110208_like extends CDbMigration
{
	
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable(
			'like',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id' => 'int(11) UNSIGNED NOT NULL',
				'blog_id' => 'int (11)',
				'liked_at_time' => 'int(11)',
				'status' => 'TINYINT(1)',
				'PRIMARY KEY (id)',
				),
			'ENGINE=InnoDB'

			);
	}

	public function safeDown()
	{
		$this->dropTable('like');
	}
	
}