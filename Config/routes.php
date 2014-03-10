<?php
App::uses( 'Routable', 'Section.Lib');

$sections = ClassRegistry::init( 'Section.Section')->find( 'threaded', array(
    'recursive' => -1,
));

Routable::nestedRoutes( $sections);

