<div class="cofree-link">
  <p><a href="#/sections"><?= __d( 'admin', "Editar secciones") ?></a></p>
  <? if( isset( $this->request->params ['section_id'])): ?>
    <p><a href="#/sections/edit/<?= $this->request->params ['section_id'] ?>"><?= __( "Editar sección") ?></a></p>
  <? endif ?>
  <div class="cofree-modal" ng-view click-anywhere-but-here></div>
</div>