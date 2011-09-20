<?php

$users_fields = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'null' => FALSE,
	),
	'email' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
	),
	'name' => array(
		'type' => 'VARCHAR',
		'constraint' => '60'
	),
	'password' => array(
		'type' => 'VARCHAR',
		'constraint' => '60',
	),
	'photo_url' => array(
		'type' => 'VARCHAR',
		'constraint' => '60',
	),
	'creation_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '60',
	),
	'last_login_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '60',
	)
);

$pages_fields = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'null' => FALSE,
	),
	'name' => array(
		'type' => 'VARCHAR',
		'constraint' => '60'
	)
);

$texts_fields = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'null' => FALSE,
	),
	'name' => array(
		'type' => 'VARCHAR',
		'constraint' => '300'
	),
	'content' => array(
		'type' => 'TEXT',
		'null' => TRUE,
		'constraint' => '9000'
	),
	'type' => array(
		'type' => 'VARCHAR',
		'constraint' => '30'
	),
	'page_id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'null' => FALSE,
	)
);

$comments_fields = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'null' => FALSE,
	),
	'content' => array(
		'type' => 'TEXT',
		'null' => TRUE,
		'constraint' => '9000'
	),
	'text_id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'null' => FALSE,
	)
);

$news_fields = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 5,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'null' => FALSE,
	),
	'name' => array(
		'type' => 'VARCHAR',
		'constraint' => '100'
	),
	'content' => array(
		'type' => 'TEXT',
		'null' => TRUE,
		'constraint' => '5000'
	),
);

?>
