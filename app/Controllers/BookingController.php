<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\Tipe;
use CodeIgniter\HTTP\ResponseInterface;

class BookingController extends BaseController
{
    public function index()
    {
        $session = session();
        $paketModel = new Paket();
        $tipeModel = new Tipe();
        $bookingModel = new Booking();

        $pakets = $paketModel->findAll();
        $tipes = $tipeModel->findAll();
        $bookings = $bookingModel->where('user_id', $session->get('auth')['user_id'])->findAll();
        // dd($bookings);
        return view('dashboard/booking', [
            'tipes' => $tipes,
            'pakets' => $pakets,
            'bookings' => $bookings
        ]);
    }
    public function create()
    {
        $session = session();
        $paketModel = new Paket();
        $tipeModel = new Tipe();
        $bookingModel = new Booking();

        $validation = \Config\Services::validation();
        $rules = [
            'name'     => 'required|max_length[255]',
            'paket_id'     => 'required|max_length[255]',
            'tipe_id'     => 'required|max_length[255]',
            'from'     => 'required|max_length[255]',
            'tour_date'     => 'required|max_length[255]',
        ];
        if (!$this->validate($rules)) {
            // Menyimpan data form dan error ke session flashdata
            $session->setFlashdata('errors', $this->validator->getErrors());

            return redirect()->to('/dashboard/booking')->withInput();
        }

        $postData = $this->request->getPost();
        $paket = $paketModel->find($postData['paket_id']);
        $tipe = $tipeModel->find($postData['tipe_id']);
        // dd($postData['tour_date']);
        $data = [
            'name'     => $postData['name'],
            'user_id'     => $session->get('auth')['user_id'],
            'tour_date'     => date('Y-m-d H:i:s', strtotime($postData['tour_date'])),
            'from'     => $postData['from'],
            'paket_name'     => $paket['name'],
            'paket_price'     => $paket['price'],
            'tipe_name'     => $tipe['name'],
            'tipe_price'     => $tipe['price'],
            'price_total'     => $paket['price'] + $tipe['price'],
            'status'     => 'unpaid',
        ];
        $id = $bookingModel->insert($data);
        if ($id) {
            $session->setFlashdata('success', 'Booking Berhasil dibuat');

            return redirect()->to('/dashboard/booking/' . $id);
        } else {
            return 'Terjadi kesalahan saat registrasi.';
        }
    }

    public function upload($id)
    {
        $session = session();
        $bookingModel = new Booking();

        $booking = $bookingModel->find($id);

        return view('dashboard/upload', compact('booking'));
    }
    public function uploadPost($id)
    {
        $session = session();
        $model = new Booking();
        $validation = \Config\Services::validation();
        $rules = [
            'invoice' => [
                'label' => 'Invoice File',
                'rules' => 'uploaded[invoice]'
                    . '|mime_in[invoice,application/pdf,image/jpg,image/jpeg,image/png]'
                    . '|max_size[invoice,2048]'
            ],
        ];

        if (!$this->validate($rules)) {
            // Menyimpan data form dan error ke session flashdata
            $session->setFlashdata('errors', $this->validator->getErrors());

            return redirect()->to('/dashboard/booking/' . $id)->withInput();
        }

        $img = $this->request->getFile('invoice');
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();

            // Define the path to the public directory
            $publicPath = FCPATH . 'uploads/' . $newName;

            // Move the file to the public/uploads directory
            $img->move(FCPATH . 'uploads', $newName);

            $data = [
                'invoice_path' => 'uploads/' . $newName
            ];
            // $booking = $model->find($id);
            if ($model->update($id, $data)) {
                $session->setFlashdata('success', 'Bukti Pembayaran Berhasil diupload');

                return redirect()->to('/dashboard/booking/' . $id);
            } else {
                return 'Terjadi kesalahan saat registrasi.';
            }
        }
    }

    public function cetak($id)
    {
        $model = new Booking();
        $booking = $model->find($id);

        return view('dashboard/cetak', compact('booking'));
    }
}
