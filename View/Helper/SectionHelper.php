<?php
/**
 * SectionHelper
 * 
 * 
 *
 * @package Section.View.Helper
 **/

class SectionHelper extends AppHelper 
{

  public $helpers = array( 'Html', 'Form', 'Acl.Auth');
  
  public function __construct( $View, $settings = array()) 
	{
		parent::__construct( $View, $settings);

		$this->Section = ClassRegistry::init( 'Section.Section');
	}
  
  public function hasAccess()
  {
    return $this->Auth->user();
  }
  
  public function nav( $menu)
  {
    $sections = $this->Section->fromMenu( $menu);
    
    $out = array();
    
    foreach( $sections as $section)
    {
      $title = !empty( $section ['Section']['title_menu']) ? $section ['Section']['title_menu'] : $section ['Section']['title'];
      $out [] = '<li>'. $this->Html->link( $title, $this->sectionUrl( $section), array(
      )) .'</li>';
    }
    
    return implode( "\n", $out);
  }
  
  public function sectionUrl( $section)
  {
    return Sections::url( $section);
  }
  
  public function adminNav()
  {
    if( !$this->Auth->user())
    {
      return false;
    }
    
    $this->Html->script( array(
        '/section/js/angular/directives/ng-slider.js',
        '/section/js/angular/controllers.js',
        '/section/js/angular/config.js',
  	), array(
  	  'inline' => false
  	));
  	
  	$this->Html->css( array(
  	    '/section/css/angular/angular-slider.css'
  	), array(
  	  'inline' => false
  	));
  	
  	return $this->_View->element( 'Section.inline/sections');
  }
  
}