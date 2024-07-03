<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class AdminPaketController extends BaseController
{
    public function index()
    {
        $pakets = (new Paket())->findAll();
        return view('admin/paket', [
            'pakets' => $pakets
        ]);
    }
    public function editPage($id)
    {
        $paket = (new Paket())->find($id);
        return view('admin/editpaket', [
            'paket' => $paket
        ]);
    }
    public function create()
    {
        $session = session();
        $model = new Paket();
        $validation = \Config\Services::validation();
        $rules = [
            'name'     => 'required|max_length[255]',
            'price'    => 'required|max_length[255]',
            'destination' => 'required|max_length[255]',
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

            return redirect()->to('/admin/paket')->withInput();
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
                'price' => $postData['price'],
                'destination' => $postData['destination'],
                'image_path' => 'uploads/' . $newName,
                'description' => $postData['description'],
            ];

            if ($model->insert($data)) {
                $session->setFlashdata('success', 'Paket Berhasil dibuat');

                return redirect()->to('/admin/paket');
            } else {
                return 'Terjadi kesalahan saat registrasi.';
            }
        }
    }
    public function update($id)
    {
        $session = session();
        $paketModel = new Paket();
        $paket = $paketModel->find($id);
        $rules = [
            'name'     => 'required|max_length[255]',
            'price'    => 'required|max_length[255]',
            'destination' => 'required|max_length[255]',
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

            return redirect()->to('/admin/paket')->withInput();
        }

        $postData = $this->request->getPost();

        $newData = [
            'name' => $postData['name'],
            'price' => $postData['price'],
            'destination' => $postData['destination'],
            'image_path' => $paket['image_path'],
            'description' => $postData['description'],
        ];

        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            if (file_exists(FCPATH . $paket['image_path'])) {
                unlink(FCPATH . $paket['image_path']);
            }
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads', $newName);
            $newData['image_path'] = 'uploads/' . $newName;
        }
        $paketModel->update($id, $newData);
        $session->setFlashdata('successDelete', 'Paket Berhasil diperbarui');

        return redirect()->to('/admin/paket');
    }

    public function delete($id)
    {
        $session = session();
        $paket = (new Paket())->find($id);
        if ($paket) {
            $filepath = FCPATH . $paket['image_path'];

            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
        (new Paket())->delete($id);
        $session->setFlashdata('successDelete', 'Paket Berhasil dihapus');

        return redirect()->to('/admin/paket');
    }
}
