<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/tentang-kami', 'Layanan::about');

$routes->get('/visi-misi', 'Layanan::visiMisi');

$routes->get('/asesmen', 'Layanan::asesmen');

$routes->get('/sop-layanan', 'Layanan::sopLayanan');

$routes->get('/syarat-daftar', 'Parenting::syaratDaftar');

$routes->get('/tim', 'GuruController::index');

$routes->get('/administrasi', 'GaleriController::index');

$routes->get('/kelas-transisi', 'SosialMedia::kelasTransisi');

$routes->get('/remedial-teaching', 'SosialMedia::remedialTeaching');

$routes->get('/interverensi-okupasi', 'SosialMedia::interverensiOkupasi');

$routes->get('/login', 'Parenting::login');

$routes->get('/register', 'Parenting::register');

$routes->get('/help', 'Home::help');