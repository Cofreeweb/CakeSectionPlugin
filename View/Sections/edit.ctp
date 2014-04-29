<form ng-submit="submit( 'edit')" name="sectionsForm">
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
      'options' => Sections::menus(),
      'empty' => false
  )) ?>
  
  <?= $this->Form->input( 'Section.slug', array(
      'name' => 'slug',
      'ng-model' => 'section.slug',
      'label' => 'URL',
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
      'name' => 'parent_id',
      'ng-model' => 'section.parent_id',
      'label' => 'Padre',
      'ng-options' => 'a.id as a.title for a in parents'
  )) ?>
  <div ng-repeat="config in configs">
    <div ng-if="config.type=='text'">
      <label>{{config.label}}</label>
      <input type="text" ng-model="section.settings[config.key]" />
    </div>
    <div ng-if="config.type=='boolean'">
      <label>{{config.label}}</label>
      <input type="checkbox" ng-model="section.settings[config.key]" />
    </div>
    <div ng-if="config.type=='select'">
      <label>{{config.label}}</label>
      <select ng-model="section.settings[config.key]" ng-options="a.key as a.value for a in config.options"></select>
    </div>
    <div ng-if="config.type=='range'">
      <label>{{config.label}}</label>
      <input ng-model="section.settings[config.key]" id="section_range_{{section.id}}" type="text" options="config.options" />
    </div>
  </div>
  <input type="submit" id="submit" value="Submit" />
</form>