<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pertanyaan;
use App\Controllers\KelasController;
use App\Controllers\TestDb;
use App\Controllers\DashboardController;
use App\Controllers\Absensi;
use App\Controllers\PenggunaController;
use App\Controllers\TimetableController;
use App\Controllers\TrainingController;
use App\Controllers\WorkshopController;
use App\Controllers\GaleriController;
use App\Controllers\PelatihanController;
use App\Controllers\GuruController;
use App\Controllers\Pages; // Pastikan ini di-import jika Anda menggunakannya untuk rute lain

/**
 * @var RouteCollection $routes
 */

// Rute untuk halaman-halaman publik (frontend)
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

// Rute untuk halaman Tanya Jawab (Frontend)
$routes->get('/tanya-jawab', [Pertanyaan::class, 'index']);
$routes->post('/tanya-jawab/submit', [Pertanyaan::class, 'submitFrontend']);

$routes->get('/galeri-kegiatan', 'Pages::galeriKegiatan');
$routes->get('/kritik-saran', 'Pages::kritikSaran');

// Rute untuk berita/galeri
$routes->get('/berita', 'GaleriController::index');
$routes->get('/berita/(:num)', 'GaleriController::detail/$1');

// Rute grup untuk pelatihan 
$routes->group('/pelatihan', function ($routes){
    $routes->get('/', 'PelatihanController::index');
    $routes->post('/', 'PelatihanController::create');
});

// Rute untuk tim (guru/staf)
$routes->get('/tim', 'GuruController::index');

// Rute grup untuk dashboard (admin area)
$routes->group('dashboard', function($routes){
    $routes->get('/', 'DashboardController::index');
    $routes->post('auth', 'DashboardController::auth');
    $routes->get('login', 'DashboardController::login');
    $routes->get('logout', 'DashboardController::logout');

    // Rute untuk halaman absensi
    $routes->get('absensi', 'Absensi::index');
    $routes->post('absensi/simpan', 'Absensi::simpanAbsensi');
    $routes->get(
        'absensi/getParticipantsByClass/(:num)',
        'Absensi::getParticipantsByClass/$1',
        ['filter' => 'noToolbar']
    );

    // Rute untuk halaman kelola pertanyaan (admin)
    $routes->get('pertanyaan', [Pertanyaan::class, 'kelola']);
    $routes->post('pertanyaan/jawab/(:num)', [Pertanyaan::class, 'jawab/$1']);
    $routes->delete('pertanyaan/delete/(:num)', [Pertanyaan::class, 'delete/$1']);

    // Rute untuk halaman kelola pengguna
    $routes->group('pengguna', function($routes){
        $routes->get('/', 'PenggunaController::index');
        $routes->post('/', 'PenggunaController::create');
        $routes->delete('(:num)', 'PenggunaController::delete/$1');
        $routes->post('(:num)', 'PenggunaController::update/$1');
        $routes->get('(:num)', 'PenggunaController::getPenggunaData/$1');
    });

    // Rute untuk halaman kelola kelas 
    $routes->group('kelas', function($routes){
        $routes->get('/', [KelasController::class, 'index']);
        $routes->post('create', [KelasController::class, 'create']);
        $routes->post('update/(:num)', [KelasController::class, 'update/$1']);
        $routes->delete('delete/(:num)', [KelasController::class, 'delete/$1']);
        $routes->get('getKelasWithUsers/(:num)', [KelasController::class, 'getKelasWithUsers/$1']);
    });

    // Rute untuk timetable
    $routes->group('timetable', function($routes){
        $routes->get('/', 'TimetableController::index');
    });

    // Rute untuk training
    $routes->group('training', function($routes){
        $routes->get('/', 'TrainingController::index');
        $routes->post('/', 'TrainingController::create');
        $routes->post('(:num)', 'TrainingController::update/$1');
        $routes->delete('(:num)', 'TrainingController::delete/$1');
    });

    // Rute untuk workshop
    $routes->group('workshop', function($routes){
        $routes->get('/', 'WorkshopController::index');
        $routes->post('/', 'WorkshopController::create');
        $routes->post('(:num)', 'WorkshopController::update/$1');
        $routes->delete('(:num)', 'WorkshopController::delete/$1');
    });
});