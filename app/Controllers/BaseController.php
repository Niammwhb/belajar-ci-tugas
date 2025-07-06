<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    // Tambah properti diskon hari ini
    protected $diskon_hari_ini;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = service('session');

        // Ambil data diskon hari ini
        $today = date('Y-m-d');
        $diskonModel = new \App\Models\DiskonModel();
        $diskon_today = $diskonModel->where('tanggal', $today)->first();
        $this->diskon_hari_ini = $diskon_today ? $diskon_today['nominal'] : null;

        
    }
}

