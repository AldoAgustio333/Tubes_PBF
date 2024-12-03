<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Pages::index');
$routes->get('/tentang-kami', 'Pages::about');
$routes->get('/visi-misi', 'Pages::visiMisi');
$routes->get('/asesmen', 'Pages::asesmen');
$routes->get('/sop-layanan', 'Pages::sopLayanan');
$routes->get('/syarat-daftar', 'Pages::syaratDaftar');
$routes->get('/kelas-transisi', 'Pages::kelasTransisi');
$routes->get('/remedial-teaching', 'Pages::remedialTeaching');
$routes->get('/interverensi-okupasi', 'Pages::interverensiOkupasi');
$routes->get('/bina-wicara', 'Pages::binaWicara');
$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Pages::register');
$routes->get('/daftar', 'Pages::daftar');
$routes->get('/lupa-password', 'Pages::lupaPassword');
$routes->get('/help', 'Pages::help');
$routes->get('/tanya-jawab', 'Pages::tanyaJawab');
$routes->get('/galeri-kegiatan', 'Pages::galeriKegiatan');
$routes->get('/kritik-saran', 'Pages::kritikSaran');

$routes->get('/berita', 'GaleriController::index');
$routes->get('/berita/(:num)', 'GaleriController::detail/$1');

$routes->group('/pelatihan', function ($routes){
    $routes->get('/', 'PelatihanController::index');
    $routes->post('/', 'PelatihanController::create');
});

$routes->get('/tim', 'GuruController::index');

$routes->group('dashboard', function($routes){
    $routes->get('/', 'DashboardController::index');
    $routes->post('auth', 'DashboardController::auth');
    $routes->get('login', 'DashboardController::login');
    $routes->get('logout', 'DashboardController::logout');
});

$routes->group('/dashboard/timetable', function($routes){
    $routes->get('/', 'TimetableController::index');
});

$routes->group('/dashboard/pengguna', function($routes){
    $routes->post('/', 'PenggunaController::create');
    $routes->delete('(:num)', 'PenggunaController::delete/$1');
    $routes->post('(:num)', 'PenggunaController::update/$1');
    $routes->get('(:num)', 'PenggunaController::getPenggunaData/$1');
});

$routes->group('/dashboard/training', function($routes){
    $routes->get('/', 'TrainingController::index');
    $routes->post('/', 'TrainingController::create');
    $routes->post('(:num)', 'TrainingController::update/$1');
    $routes->delete('(:num)', 'TrainingController::delete/$1');
});

$routes->group('/dashboard/workshop', function($routes){
    $routes->get('/', 'WorkshopController::index');
    $routes->post('/', 'WorkshopController::create');
    $routes->post('(:num)', 'WorkshopController::update/$1');
    $routes->delete('(:num)', 'WorkshopController::delete/$1');
});
