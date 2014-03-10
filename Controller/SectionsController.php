<?php
App::uses('SectionAppController', 'Section.Controller');
/**
 * Sections Controller
 *
 */
class SectionsController extends SectionAppController 
{
  
  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->allow();
  }
  
  public function admin_add()
  {
    if( $this->request->is( 'post', 'put'))
    {
      $this->Section->create();

      if( $this->Section->save( $this->request->data))
      { 
        $this->set( 'redirect', false);
        
        // Dispara el evento para que lo recoja quien tenga que hacerlo
        $event = new CakeEvent( 'Section.Controller.Sections.create.'. $this->request->data ['plugin'], $this);
    		$this->getEventManager()->dispatch( $event);
    		
        $this->set( 'success', true);
        $this->set( '_serialize', array( 'success', 'redirect'));
      }
    }
  }
  
  public function admin_edit()
  {
    if( $this->request->is( 'post', 'put'))
    {
      $this->Section->create();

      if( $this->Section->save( $this->request->data))
      {        
        $this->set( 'success', true);
        $this->set( '_serialize', array( 'success'));
      }
    }
  }
  
  public function rest_get( $id = null)
  {
    if( $id)
    {
      $section = $this->Section->find( 'first', array(
          'conditions' => array(
              'Section.id' => $id
          ),
          'fields' => array(
              'Section.id',
              'Section.title',
              'Section.plugin',
              'Section.settings',
              'Section.menu'
          )
      ));
      
      $tree = $this->Section->generateTreeList( array(
          'NOT' => array(
              'Section.id' => $id
          )
      ));

      foreach( $tree as $id => $title)
      {
        $parents [] = array(
            'id' => $id,
            'title' => $title
        );
      }
      
      $configs = Sections::read( $section ['Section']['plugin'] .'.settings');
      
      $this->set( array( 
          'section' => $section ['Section'],
          'configs' => $configs,
          'parents' => $parents, 
          '_serialize' => array( 'section', 'parents', 'configs')
      ));
    }
    else
    {
      $sections = $this->Section->getSections();

      $this->set( array( 'sections' => $sections, '_serialize' => array( 'sections')));
    }
  }
  
  public function rest_delete()
  {
    $this->Section->delete( $this->request->data ['id']);
    $this->set( array(
        'success' => true,
        '_serialize' => array( 'success')
    ));
  }
  
  
  public function rest_sort()
  {
    _d( $this->request->data);
  }
  
  public function url( $section_id)
  {
    return Sections::url( $section_id);
  }

}
