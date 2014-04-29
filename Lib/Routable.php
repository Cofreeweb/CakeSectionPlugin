<?php

/**
* 
*/
class Routable
{
  
  public function add( $section, $path)
  {
    $plugins = CakePlugin::loaded();

    if( in_array( 'I18n', $plugins))
    {
      $params = array('routeClass' => 'I18nRoute');
    }
    else
    {
      $params = array();
    }
    
    $path = $path . '/'. $section ['Section']['slug'];
    
    $url = Sections::read( $section ['Section']['plugin'] .'.url');
    $url ['section_id'] = $section ['Section']['id'];
    
    Router::connect( $path, $url, $params);
    
    $route = Sections::read( $section ['Section']['plugin']);
    
    $admins = Sections::read( $section ['Section']['plugin'] .'.admin');
    
    if( !empty( $admins))
    {
      foreach( $admins as $admin)
      {
        $admin ['section_id'] = $section ['Section']['id'];
        $admin [$admin ['action']] = true;
        
        if( isset( $route ['sluggable']))
        {
          Router::connect( $path .'/:slug/'. $admin ['action'], $admin, $params);
        }
        else
        {
          Router::connect( $path .'/'. $admin ['action'], $admin, $params);
        }
      }
    }
    
    if( isset( $route ['sluggable']))
    {
      $path .= '/:slug';
      $url ['action'] = $route ['sluggable'];
      Router::connect( $path, $url, $params);
    }
    
    unset( $url ['section']);
  }
  
  public function nestedRoutes( $sections, $path = '')
  {
    foreach( $sections as $section)
    {
      Routable::add( $section, $path);
      
      if( !empty( $section ['children']))
      {
        Routable::nestedRoutes( $section ['children'], $path .'/'. $section ['Section']['slug']);
      }
    }
  }
}
