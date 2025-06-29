<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Toolbar; // Import kelas Toolbar

/**
 * Filter kustom untuk menonaktifkan CodeIgniter Debug Toolbar
 * untuk permintaan AJAX.
 */
class NoToolbarFilter implements FilterInterface
{
    /**
     * Metode ini dipanggil sebelum eksekusi controller.
     * Jika permintaan adalah AJAX, Debug Toolbar akan dinonaktifkan.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah permintaan saat ini adalah permintaan AJAX.
        if ($request->isAJAX()) {
            // Dapatkan instance konfigurasi Debug Toolbar.
            $toolbarConfig = config(Toolbar::class);
            
            // Nonaktifkan toolbar untuk permintaan ini.
            $toolbarConfig->enabled = false;
        }
    }

    /**
     * Metode ini dipanggil setelah eksekusi controller.
     * Tidak ada tindakan yang diperlukan di sini.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada yang perlu dilakukan.
    }
}