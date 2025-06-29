<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Workshop_model;
use CodeIgniter\HTTP\ResponseInterface;

class WorkshopController extends BaseController
{
    protected $workshop;

    public function __construct()
    {
        $this->workshop = new Workshop_model();
    }

    public function index()
    {
        $data['workshop'] = $this->workshop->getWorkshop();
        if (session()->get('email')) {
            return view('pages/dashboard/workshops', $data);
        } else {
            return redirect()->to(base_url('/dashboard/login'));
        }
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "nama" => "required",
            "tempat" => "required",
            "tanggal" => "required|valid_date[tanggal, Y-m-d]|greater_than_today",
            "jam_mulai" => "required",
            "jam_selesai" => "required|greater_than[jam_mulai]",
            "image" => "uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]",
        ]);

        if ($validation->withRequest($this->request)->run()) {
            
            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/assets/image/workshop', $imageName);

                $this->workshop->insert([
                    "nama" => $this->request->getPost('nama'),
                    "tempat" => $this->request->getPost('tempat'),
                    "tanggal" => $this->request->getPost('tanggal'),
                    "jam_mulai" => $this->request->getPost('jam_mulai'),
                    "jam_selesai" => $this->request->getPost('jam_selesai'),
                    "image" => $imageName,
                ]);

                return redirect()->to('/dashboard/workshop')->with('success', 'Workshop added successfully.');
            } else {
                return redirect()->back()->with('error', 'There was a problem uploading the image.');
            }
        } else {
            return redirect()->back()->withInput()->with('validation', $validation);
        }
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "nama" => "required",
            "tempat" => "required",
            "tanggal" => "required|valid_date[tanggal, Y-m-d]|greater_than_today",
            "jam_mulai" => "required",
            "jam_selesai" => "required|greater_than[jam_mulai]",
        ]);

        if ($validation->withRequest($this->request)->run()) {
            
            $this->workshop->update($id, [
                "nama" => $this->request->getPost('nama'),
                "tempat" => $this->request->getPost('tempat'),
                "tanggal" => $this->request->getPost('tanggal'),
                "jam_mulai" => $this->request->getPost('jam_mulai'),
                "jam_selesai" => $this->request->getPost('jam_selesai'),
            ]);
            return redirect()->to('/dashboard/workshop')->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->back()->withInput()->with('validation', $validation);
        }
    }

    public function delete($id)
    {
        $this->workshop->delete($id);
        return redirect()->to('/dashboard/workshop')->with('success', 'Workshop deleted successfully.');
    }
}
