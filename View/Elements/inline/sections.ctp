  <li><a ui-sref="sections"><?= __d( 'admin', "Editar secciones") ?></a></li>
  <? if( isset( $this->request->params ['section_id'])): ?>
    <li><a href="#/sections/edit/<?= $this->request->params ['section_id'] ?>"><?= __( "Editar sección") ?></a></li>
  <? endif ?>
