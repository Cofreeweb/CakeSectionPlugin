
  <script type="text/ng-template" id="items_renderer.html">
    <div >
      <a href="#/sections/edit/{{section.id}}">{{section.title}}</a>
      <span ng-click="deleteSection()" data-id={{section.id}}><?= __d( 'admin', "Borrar")?></span>
    </div>
    <ol ui-nested-sortable="options" ng-model="section.items">
      <li ng-repeat="section in section.items" ui-nested-sortable-item="" ng-include="'items_renderer.html'">
      </li>
    </ol>
  </script>
            
  <a href="#/sections/add"><?= __( "Crear nueva sección") ?></a>
  <div>
    <ol ui-nested-sortable="options" ng-model="sections">
      <li ng-repeat="section in sections" ui-nested-sortable-item="" ng-include="'items_renderer.html'"></li>
    </ol>
  </div>