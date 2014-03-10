<form ng-submit="submit( 'add')" ng-controller="SectionsEditCtrl">
  <?= $this->Form->input( 'Section.title', array(
      'name' => 'title',
      'ng-model' => 'section.title',
      'label' => 'Título'
  )) ?>
  
  <?= $this->Form->input( 'Section.menu', array(
      'type' => 'select',
      'name' => 'menu',
      'ng-model' => 'section.menu',
      'label' => 'Menu',
      'options' => Sections::menus()
  )) ?>
  
  <?= $this->Form->input( 'Section.plugin', array(
      'type' => 'select',
      'name' => 'plugin',
      'ng-model' => 'section.plugin',
      'label' => 'Controlador',
      'options' => Sections::plugins()
  )) ?>
  
  <?= $this->Form->input( 'Section.parent_id', array(
      'type' => 'select',
      'name' => 'controller',
      'ng-model' => 'section.parent_id',
      'label' => 'Padre',
      'ng-options' => 'a.id as a.title for a in parents'
  )) ?>
  
  <input type="submit" id="submit" value="Submit" />
</form>