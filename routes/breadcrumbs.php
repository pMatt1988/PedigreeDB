<?php

Breadcrumbs::for('dogs', function($trail) {
    $trail->push('Dogs', route('dogindex'));
});



Breadcrumbs::for('dogcreate', function($trail) {
    $trail->parent('dogs');
    $trail->push('Create', route('dogcreate'));
});

require __DIR__.'/breadcrumbs/backend/backend.php';

