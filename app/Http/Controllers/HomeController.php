<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data = $this->getDataLimit(6);
        return view('index', [
            'data' => $data,
        ]);
    }
}
