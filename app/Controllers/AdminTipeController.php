<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tipe;
use CodeIgniter\HTTP\ResponseInterface;

class AdminTipeController extends BaseController
{
    public function index()
    {
        $model = new Tipe();
        $tipes = $model->findAll();
        return view('admin/tipe', [
            'tipes' => $tipes
        ]);
    }

    public function create()
    {
        $session = session();
        $model = new Tipe();
        $validation = \Config\Services::validation();
        $rules = [
            'name'     => 'required|max_length[255]',
            'type'    => 'required|max_length[255]',
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[image,1024]'
            ],
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            // Menyimpan data form dan error ke session flashdata
            $session->setFlashdata('errors', $this->validator->getErrors());

            return redirect()->to('/admin/tipe')->withInput();
        }

        $postData = $this->request->getPost();
        $img = $this->request->getFile('image');
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();

            // Define the path to the public directory
            $publicPath = FCPATH . 'uploads/' . $newName;

            // Move the file to the public/uploads directory
            $img->move(FCPATH . 'uploads', $newName);

            $data = [
                'name' => $postData['name'],
                'type' => $postData['type'],
                'image_path' => 'uploads/' . $newName,
                'description' => $postData['description'],
            ];

            if ($model->insert($data)) {
                $session->setFlashdata('success', 'Tipe Kendaraan Berhasil dibuat');

                return redirect()->to('/admin/tipe');
            } else {
                return 'Terjadi kesalahan saat registrasi.';
            }
        }
    }
    public function editPage($id)
    {
        $model = new Tipe();
        $tipe = $model->find($id);
        return view('admin/edittipe', [
            'tipe' => $tipe
        ]);
    }
    public function update($id)
    {
        $session = session();
        $tipeModel = new Tipe();
        $tipe = $tipeModel->find($id);
        $rules = [
            'name'     => 'required|max_length[255]',
            'type'    => 'required|max_length[255]',
            'image' => [
                'label' => 'Image File',
                'rules' => 'if_exist|uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[image,1024]'
            ],
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            // Menyimpan data form dan error ke session flashdata
            $session->setFlashdata('errors', $this->validator->getErrors());

            return redirect()->to('/admin/tipe')->withInput();
        }

        $postData = $this->request->getPost();

        $newData = [
            'name' => $postData['name'],
            'type' => $postData['type'],
            'image_path' => $tipe['image_path'],
            'description' => $postData['description'],
        ];

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            if (file_exists(FCPATH . $tipe['image_path'])) {
                unlink(FCPATH . $tipe['image_path']);
            }
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads', $newName);
            $newData['image_path'] = 'uploads/' . $newName;
        }
        $tipeModel->update($id, $newData);
        $session->setFlashdata('successDelete', 'Tipe Berhasil diperbarui');

        return redirect()->to('/admin/tipe');
    }
    public function delete($id)
    {
        $session = session();
        $tipe = (new Tipe())->find($id);
        if ($tipe) {
            $filepath = FCPATH . $tipe['image_path'];

            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
        (new Tipe())->delete($id);
        $session->setFlashdata('successDelete', 'Kendaraan Berhasil dihapus');

        return redirect()->to('/admin/tipe');
    }
}
