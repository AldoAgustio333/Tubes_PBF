<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Debug\Toolbar\Collectors\Database;
use CodeIgniter\Debug\Toolbar\Collectors\Events;
use CodeIgniter\Debug\Toolbar\Collectors\Files;
use CodeIgniter\Debug\Toolbar\Collectors\Logs;
use CodeIgniter\Debug\Toolbar\Collectors\Routes;
use CodeIgniter\Debug\Toolbar\Collectors\Timers;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

/**
 * Konfigurasi Debug Toolbar CodeIgniter 4.
 *
 * Debug Toolbar menyediakan cara untuk melihat informasi tentang performa
 * dan status aplikasi Anda selama tampilan halaman. Secara default tidak akan
 * ditampilkan di lingkungan produksi, dan hanya akan ditampilkan jika
 * `CI_DEBUG` bernilai true.
 */
class Toolbar extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Toolbar Collectors
     * --------------------------------------------------------------------------
     *
     * Daftar kolektor toolbar yang akan dipanggil saat Debug Toolbar
     * diaktifkan dan mengumpulkan data.
     *
     * @var list<class-string>
     */
    public array $collectors = [
        Timers::class,
        Database::class,
        Logs::class,
        Views::class,
        // \CodeIgniter\Debug\Toolbar\Collectors\Cache::class, // Komentar ini tetap seperti aslinya
        Files::class,
        Routes::class,
        Events::class,
    ];

    /**
     * --------------------------------------------------------------------------
     * Collect Var Data
     * --------------------------------------------------------------------------
     *
     * Jika disetel ke false, data variabel dari view tidak akan dikumpulkan.
     * Berguna untuk menghindari penggunaan memori yang tinggi saat banyak data
     * diteruskan ke view.
     */
    public bool $collectVarData = true;

    /**
     * --------------------------------------------------------------------------
     * Max History
     * --------------------------------------------------------------------------
     *
     * `$maxHistory` mengatur batas jumlah permintaan sebelumnya yang disimpan,
     * membantu menghemat ruang file yang digunakan untuk menyimpannya. Anda dapat
     * mengaturnya ke 0 (nol) agar tidak ada riwayat yang disimpan, atau -1
     * untuk riwayat tanpa batas.
     */
    public int $maxHistory = 20;

    /**
     * --------------------------------------------------------------------------
     * Toolbar Views Path
     * --------------------------------------------------------------------------
     *
     * Jalur lengkap ke view yang digunakan oleh toolbar.
     * Ini HARUS diakhiri dengan garis miring ('/').
     */
    public string $viewsPath = SYSTEMPATH . 'Debug/Toolbar/Views/';

    /**
     * --------------------------------------------------------------------------
     * Max Queries
     * --------------------------------------------------------------------------
     *
     * Jika Kolektor Database diaktifkan, ia akan mencatat setiap query yang
     * dihasilkan oleh sistem agar dapat ditampilkan di timeline toolbar
     * dan di log query. Ini dapat menyebabkan masalah memori dalam beberapa kasus
     * dengan ratusan query.
     *
     * `$maxQueries` mendefinisikan jumlah maksimum query yang akan disimpan.
     */
    public int $maxQueries = 100;

    /**
     * --------------------------------------------------------------------------
     * Watched Directories
     * --------------------------------------------------------------------------
     *
     * Berisi array direktori yang akan dipantau untuk perubahan dan
     * digunakan untuk menentukan apakah fitur hot-reload harus memuat ulang
     * halaman atau tidak. Kami membatasi nilainya untuk menjaga performa
     * setinggi mungkin.
     *
     * CATATAN: ROOTPATH akan ditambahkan ke semua nilai.
     *
     * @var list<string>
     */
    public array $watchedDirectories = [
        'app',
    ];

    /**
     * --------------------------------------------------------------------------
     * Watched File Extensions
     * --------------------------------------------------------------------------
     *
     * Berisi array ekstensi file yang akan dipantau untuk perubahan dan
     * digunakan untuk menentukan apakah fitur hot-reload harus memuat ulang
     * halaman atau tidak.
     *
     * @var list<string>
     */
    public array $watchedExtensions = [
        'php', 'css', 'js', 'html', 'svg', 'json', 'env',
    ];

    /**
     * --------------------------------------------------------------------------
     * Abaikan AJAX
     * --------------------------------------------------------------------------
     *
     * Jika disetel ke true, Debug Toolbar tidak akan mencoba menyisipkan dirinya
     * ke dalam respons untuk permintaan AJAX. Ini penting untuk mencegah
     * respons JSON yang rusak.
     *
     * @var bool
     */
    public bool $ignoreAJAX = true; // UBAH NILAI INI MENJADI TRUE
}
