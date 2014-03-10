<?php

/**
* 
*/
class Sections
{
  
/**
 * Aquí se va guardando la configuración de cada Plugin
 */
  protected static $_config = array();
  
  
/**
 * Lee la configuración de cada plugin
 *
 * @return void
 */
  public function loadConfig()
  {
    $plugins = App::objects( 'plugin');
    foreach( $plugins as $plugin)
    {
      if( CakePlugin::loaded( $plugin))
      {
        $path = App::pluginPath( $plugin) . 'Config'. DS. 'section.php';

        if( file_exists( $path))
        {
          Configure::load( $plugin .'.section', 'default', false);
          $data = Configure::read( 'SectionSettings');
          self::$_config [$plugin] = $data;
        }
      }
    }
  }
  
/**
 * Devuelve un valor de la configuración de las Section, dado un hash tipo Plugin.key1.key2
 *
 * @param string $var 
 * @return void
 * @example Sections::read( 'Blog.name') => devolverá el nombre humano del plugin
 */
  public function read( $var)
  {
    if( empty( self::$_config))
    {
      self::loadConfig();
    }
    $return = Hash::get( self::$_config, $var);

    return $return;
  }
  
/**
 * Devuelve un array con plugin_name => plugin_human_name
 *
 * @return void
 * @example Sections::plugins()
 */
  public function plugins()
  {
    if( empty( self::$_config))
    {
      self::loadConfig();
    }
    
    $config = self::$_config;
    
    $return = array();
    
    foreach( $config as $plugin => $info)
    {
      $return [$plugin] = $info ['name'];
    }
    
    return $return;
  }
  
  public function menus()
  {
    return Configure::read( 'Section.menus');
  }
  
/**
 * Devuelve la URL de la sección
 *
 * @param mixed $section puede ser un section_id o un registro de section
 * @return string
 */
  public function url( $section)
  {
    if( !is_array( $section))
    {
      $section = ClassRegistry::init( 'Section.Section')->findById( $section);
    }

    $url = Sections::read( $section ['Section']['plugin'].'.url');
    $url ['admin'] = false;
    $url ['section_id'] = $section ['Section']['id'];
    CakeLog::write( 'debug', print_r( $url, true));
    return Router::url( $url);
  }
}
