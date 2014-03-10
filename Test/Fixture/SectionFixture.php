<?php
/**
 * SectionFixture
 *
 */
class SectionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'site_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'title_menu' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'index'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'lft' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'index'),
		'rght' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'index'),
		'body_class' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'hidden' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'cover_children_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'action_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'external_url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'access_key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'target_blank' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'menu' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'permalink' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'insert_menu' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'childrens_table_bool' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'ssl' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'restricted' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'webmap' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'legacy_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'slug' => array('column' => 'slug', 'unique' => 0),
			'parent_id' => array('column' => 'parent_id', 'unique' => 0),
			'lft' => array('column' => 'lft', 'unique' => 0),
			'rght' => array('column' => 'rght', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'site_id' => 1,
			'slug' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'title_menu' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1,
			'level' => 1,
			'lft' => 1,
			'rght' => 1,
			'body_class' => 'Lorem ipsum dolor sit amet',
			'hidden' => 1,
			'cover_children_id' => 1,
			'action_type' => 'Lorem ipsum dolor ',
			'external_url' => 'Lorem ipsum dolor sit amet',
			'access_key' => '',
			'target_blank' => 1,
			'menu' => 'Lorem ipsum dolor sit amet',
			'permalink' => 'Lorem ipsum dolor sit amet',
			'insert_menu' => 1,
			'childrens_table_bool' => 1,
			'ssl' => 1,
			'restricted' => 1,
			'webmap' => 1,
			'legacy_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-02-04 23:03:46',
			'modified' => '2014-02-04 23:03:46'
		),
	);

}
