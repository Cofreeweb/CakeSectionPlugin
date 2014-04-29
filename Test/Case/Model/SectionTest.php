<?php
App::uses('Section', 'Section.Model');

/**
 * Section Test Case
 *
 */
class SectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.section.section',
    'plugin.configuration.configuration'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Section = ClassRegistry::init('Section.Section');
    $this->Configuration = ClassRegistry::init('Configuration.Configuration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Section);

		parent::tearDown();
	}
  
/**
 * Toma las secciones para el menú de edición
 *
 * @return void
 */
  public function testGetSections()
  {
    $this->Configuration->readConfig();
    $sections = $this->Section->getSections();
  }

/**
 * Toma los menús disponibles para la configuración actual
 *
 * @return void
 */
  public function testGetMenus()
  {
    App::uses( 'Sections', 'Section.Lib');
    $this->Configuration->readConfig();
    
    $menus = Sections::menus();
  }

}
