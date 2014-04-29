  <? $menus = Sections::menus() ?>
  
  <? foreach( $menus as $menu => $name): ?>
    <script type="text/ng-template" id="items_renderer_<?= $menu ?>.html">
      <div class="tree-node" id="section-el-{{section.id}}">
        <div class="tree-node-content">
          <span ui-tree-handle><?= __d( "admin", "Mover") ?></span>
          {{section.title}} | <a href="#/sections/edit/{{section.id}}"><?= __d( "admin", 'Editar') ?></a>
          <span data-remove="#section-el-{{section.id}}" delete-content="/admin/section/sections/delete.json" data-id={{section.id}}><?= __d( 'admin', "Borrar")?></span>
        </div>
      </div>
      <ol ui-tree-nodes ng-model="section.items">
        <li ng-repeat="section in section.items" ui-tree-node ng-include="'items_renderer_<?= $menu ?>.html'"></li>
      </ol>
    </script>
            
  <? endforeach ?>
  
  <a href="#/sections/add"><?= __( "Crear nueva sección") ?></a>
  
  <? foreach( $menus as $menu => $name): ?>
      <h3><?= $name ?></h3>
      <div ui-tree="treeOptions" id="tree-sections">
        <ol ui-tree-nodes ng-model="sections.<?= $menu ?>">
          <li ng-repeat="section in sections.<?= $menu ?>" ui-tree-node ng-include="'items_renderer_<?= $menu ?>.html'"></li>
        </ol> 
      </div>
  <? endforeach ?>