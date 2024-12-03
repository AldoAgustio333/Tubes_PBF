<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Training_model;
use App\Models\Workshop_model;
use CodeIgniter\HTTP\ResponseInterface;

class TimetableController extends BaseController
{

    public function __construct()
    {
        $this->training = new Training_model();
        $this->workshop = new Workshop_model();
    }

    public function index()
    {

        $data = [
            'training' => $this->training->getTraining(),
            'workshop' => $this->workshop->getWorkshop(),
        ];

        if(session()->get('email')){
            return view('pages/dashboard/timetable', $data);
        } else {
            return redirect()->to(base_url('/dashboard/login'));
        }
    }
}
