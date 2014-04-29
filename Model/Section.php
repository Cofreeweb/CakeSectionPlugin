<?php
App::uses('SectionAppModel', 'Section.Model');
/**
 * Section Model
 *
 */
class Section extends SectionAppModel 
{

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'Tree',
		'Upload.Uploadable',
    'Cofree.Sluggable' => array(
    		'fields' => array(
    		    'title',
    		),
    ),
    'Cofree.Jsonable' => array(
        'fields' => array(
            'settings'
        )
    )
	);

  
  public function afterSave( $created)
  {
    if( $created)
    {
      $event = new CakeEvent( 'Section.Model.Section.create.'. $this->data [$this->alias]['plugin'], $this);
  		$this->getEventManager()->dispatch($event);
    }
  }
  
  
  public function fromMenu( $menu)
  {
    $_sections = $this->find( 'all', array(
        'conditions' => array(
            'Section.menu' => $menu
        ),
        'order' => array(
            'Section.lft' => 'asc'
        )
    ));

    $_sections = $this->_findThreaded( 'after', null, $_sections);
    
    foreach( $_sections as $section)
    {
      $sections [$section ['Section']['id']] = $section;
    }
    
    return $sections;
  }
  
/**
 * Toma todas las secciones agrupadas por claves de menú
 *
 * @return array
 */
  public function getSections()
  {
    $sections = array();
    
    $menus = Sections::menus();
    
    foreach( $menus as $menu => $name)
    {
      $sections [$menu] = array();
      
      $data = $this->find( 'threaded', array(
        'conditions' => array(
          'Section.menu' => $menu
        ),
        'fields' => array(
          'Section.id',
          'Section.title',
          'Section.parent_id',
          'Section.menu',
          'Section.slug'
        ),
        'order' => array(
          'Section.lft'
        )
      ));
      
      $data = $this->__buildForJson( $data);
      $sections [$menu] = $data;
    }
    
    return $sections;
  }
  
/**
 * Guarda el array de las secciones para ser usado por un js sortable
 * Utiliza la clave 'items' para las secciones hijo
 *
 * @param array $datas 
 * @return array
 */
  private function __buildForJson( $datas)
  {
    $sections = array();
    
    foreach( $datas as $data)
    {
      $section = $data ['Section'];
      
      if( !empty( $data ['children']))
      {
        $section ['items'] = $this->__buildForJson( $data ['children']);
      }
      else
      {
        $section ['items'] = array();
      }
      
      $sections [] = $section;
    }
    return $sections;
  }
  
/**
 * Guarda el árbol de secciones desde un post enviado por un js sortable
 *
 * @param array $data 
 * @return void
 */
  public function saveTree( $data)
  {
    $this->Behaviors->disable( 'Tree');
    
    $i = 1;
    
    foreach( $data as $menu => $sections)
    {
      $i = $this->__saveTree( $sections, $menu, $i);
    }
    
    $this->Behaviors->attach( 'Tree');
    $this->recover();
    $this->reorder();
  }
  
  /**
   * Guarda un árbol de secciones. Si la sección tiene hijos, llama a la función recursivamente
   *
   * @param array $sections Las secciones
   * @param string $menu El nombre del menú
   * @param integer $i El número de orden
   * @param integer $parent_id La sección padre
   * @return void
   */
  private function __saveTree( $sections, $menu, $i = 1, $parent_id = 0)
  {
    foreach( $sections as $section)
    {
      $this->id = $section ['id'];
      $this->saveField( 'lft', $i);
      $this->saveField( 'menu', $menu);
      $this->saveField( 'parent_id', $parent_id);
      $i++;
      
      if( !empty( $section ['items']))
      {
        $i = $this->__saveTree( $section ['items'], $menu, $i, $section ['id']);
      }
    }
    
    return $i;
  }
  
}
