<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookingController extends BaseController
{
    public function index()
    {
        return view('dashboard/booking');
    }
}