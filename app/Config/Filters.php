<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
// Import filter kustom yang baru dibuat
use App\Filters\NoToolbarFilter;

class Filters extends BaseFilters
{
    /**
     * Mengkonfigurasi alias untuk kelas Filter.
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'noToolbar'     => NoToolbarFilter::class, // ALIAS UNTUK FILTER KUSTOM ANDA
    ];

    /**
     * Daftar filter khusus yang diperlukan.
     *
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Memaksa Permintaan Aman Global (HTTPS)
            'pagecache',  // Caching Halaman Web
        ],
        'after' => [
            'pagecache',   // Caching Halaman Web
            'performance', // Metrik Performa
            'toolbar',     // Debug Toolbar akan tetap ada di sini
        ],
    ];

    /**
     * Daftar alias filter yang selalu diterapkan pada setiap permintaan.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            // 'noToolbar', // MENJALANKAN FILTER KUSTOM ANDA PADA SETIAP REQUEST (SEBELUM CONTROLLER)
        ],
        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * Daftar alias filter yang berfungsi pada metode HTTP tertentu.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * Daftar alias filter yang harus dijalankan pada pola URI tertentu.
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [];
}