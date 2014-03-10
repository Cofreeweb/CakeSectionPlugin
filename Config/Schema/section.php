<?php 

class SectionSchema extends CakeSchema {

/**
 * Name
 *
 * @var string
 */
	public $name = 'Section';

/**
 * Before callback
 *
 * @param string Event
 * @return boolean
 */
	public function before($event = array()) {
		return true;
	}

/**
 * After callback
 *
 * @param string Event
 * @return boolean
 */
	public function after($event = array()) {
		return true;
	}

/**
 * Schema for taggeds table
 *
 * @var array
 */
	public $sections = array(
	  'id' => array( 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
    'site_id' => array( 'type' => 'boolean', 'length' => 3, 'null' => true, 'default' => NULL, 'key' => 'index'),
    'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index'),
    'title' => array( 'type' => 'string', 'null' => true),
    'title_menu' => array( 'type' => 'string', 'null' => true),
    'parent_id' => array( 'type' => 'integer', 'null' => false, 'default' => 0, 'key' => 'index'),
    'level' => array( 'type' => 'integer', 'length' => 3, 'null' => false),
    'lft' => array( 'type' => 'integer', 'length' => 9, 'null' => false, 'key' => 'index'),
    'rght' => array( 'type' => 'integer', 'length' => 9, 'null' => false, 'key' => 'index'),
    'body_class' => array( 'type' => 'string', 'length' => 50, 'null' => true),
    'hidden' => array( 'type' => 'boolean', 'default' => 0),
    'cover_children_id' => array( 'type' => 'integer', 'null' => true, 'default' => null),
    'plugin' => array( 'type' => 'string', 'length' => 20, 'null' => false),
    'external_url' => array( 'type' => 'string', 'null' => false),
    'access_key' => array( 'type' => 'string', 'length' => 2, 'null' => false),
    'target_blank' => array( 'type' => 'boolean'),
    'menu' => array( 'type' => 'string', 'length' => 50, 'null' => true),
    'insert_menu' => array( 'type' => 'boolean'),
    'childrens_table_bool' => array( 'type' => 'boolean'),
    'ssl' => array( 'type' => 'boolean', 'default' => 0, 'key' => 'index'),
    'restricted' => array( 'type' => 'boolean', 'default' => 0, 'key' => 'index'),
    'webmap' => array( 'type' => 'boolean', 'default' => 1, 'key' => 'index'),
    'legacy_url'  => array( 'type' => 'string', 'null' => true),
    'settings' => array( 'type' => 'text', 'null' => true, 'default' => null),
    'created' => array( 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
    'indexes' => array(
 		    'PRIMARY' => array( 'column' => 'id', 'unique' => 1), 
 		    'site_id' => array( 'column' => 'site_id', 'unique' => 0),
 		    'hidden' => array( 'column' => 'hidden', 'unique' => 0),
 		    'slug' => array( 'column' => 'slug',  'unique' => 0),
 		    'parent_id' => array( 'column' => 'parent_id', 'unique' => 0),
 		    'lft' => array( 'column' => 'lft', 'unique' => 0),
 		    'rght' => array( 'column' => 'rght', 'unique' => 0),
 		 )
	);
	
	

}
