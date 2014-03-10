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
    $sections = $this->find( 'all', array(
        'conditions' => array(
            'Section.menu' => $menu
        ),
        'order' => array(
            'Section.lft' => 'asc'
        )
    ));

    $sections = $this->_findThreaded( 'after', null, $sections);
    return $sections;
  }
  
  public function getSections()
  {
    $datas = $this->find( 'threaded', array(
        'fields' => array(
            'Section.id',
            'Section.title',
            'Section.parent_id'
        ),
        'order' => array(
            'Section.lft'
        )
    ));

    $sections = $this->__buildForJson( $datas);
    return $sections;
  }
  
  private function __buildForJson( $datas)
  {
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
  
}
