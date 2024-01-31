<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/data', 'Crud::index');
$routes->get('/add', 'Crud::add');
$routes->post('/add_validation', 'Crud::add_validation');
$routes->get('/generate-xml', 'Crud::generateXML');
$routes->get('/reader-xml', 'Crud::readerXML');
$routes->post('/read-xml', 'Crud::readXML');
