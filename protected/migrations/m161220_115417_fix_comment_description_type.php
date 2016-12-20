<?php
class m161220_115417_fix_comment_description_type extends CDbMigration {
	
	public function safeUp() {
		$this->alterColumn('comment', 'comment_description', 'text');
	}

	public function safeDown() {
	}
}