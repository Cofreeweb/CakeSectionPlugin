<?php
/**
 * SectionFixture
 *
 */

App::uses('SQLTestFixture', 'Fixturize.TestSuite/Fixture');

class SectionFixture extends SQLTestFixture 
{
/**
 * Es necesario indicar el plugin para el SQLTestFixture
 */
  public $plugin = 'Section';


/**
 * El nombre del fichero SQL, situado en el directorio Fixtures/SQL
 */
  public $file = 'sections.sql';
}
