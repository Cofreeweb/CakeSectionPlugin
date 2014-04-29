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
  
  protected static $_menusNames = array();
  
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
    
    // Los nombres humanos de los menús
    self::$_menusNames ['main'] = __d( 'admin', 'Principal');
    self::$_menusNames ['bottom'] = __d( 'admin', 'Inferior');
    self::$_menusNames ['top'] = __d( 'admin', 'Superior');
    self::$_menusNames ['none'] = __d( 'admin', 'Sin menú');
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
    self::loadConfig();
    
    $menus = Configure::read( 'Configuration.theme.menus');
    
    array_unshift( $menus, 'none');
    
    $data = array();
    
    foreach( $menus as $menu)
    {
      $data [$menu] = self::menuName( $menu);
    }
    
    return $data;
  }
  
  public static function menuName( $menu)
  {
    return self::$_menusNames [$menu];
  }
  
/**
 * Devuelve la URL de la sección
 *
 * @param mixed $section puede ser un section_id o un registro de section
 * @return string
 */
  public function url( $section, $edit = false)
  {
    if( !is_array( $section))
    {
      $section = ClassRegistry::init( 'Section.Section')->findById( $section);
    }
    
    $key = !$edit ? 'url' : 'edit';

    $url = Sections::read( $section ['Section']['plugin'] .'.'. $key);
    $url ['admin'] = false;
    $url ['section_id'] = $section ['Section']['id'];
    
    if( $edit)
    {
      $url ['edit'] = true;
    }
    return Router::url( $url);
  }
}
