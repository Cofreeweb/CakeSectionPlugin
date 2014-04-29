<?php

$config ['Access'] = array(
    'section' => array(
      'name' => __d( 'admin', 'Secciones'),
      'urls' => array(
          array(
                'admin' => true,
                'plugin' => 'section',
                'controller' => 'sections',
                'action' => 'edit'
          ),
          array(
                'admin' => true,
                'plugin' => 'section',
                'controller' => 'sections',
                'action' => 'index'
          ),
          array(
                'admin' => true,
                'plugin' => 'section',
                'controller' => 'sections',
                'action' => 'delete'
          ),
      )     
    )
);
