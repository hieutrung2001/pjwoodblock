<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WoodblockController extends Controller
{
    public function index() {
        $data = $this->getDataLimit();
        return view('woodblock', [
            'data' => $data,
        ]);
    }

    public function search(Request $request) {
        $data = $request->all();
        $result = $this->searchWoodblock($this->getDataLimit(), $data['search']);
        // dd($result);
        // dd($this->getDataLimit());
        return view('woodblock', [
            'data' => $result,
        ]);
    }

    public function detail($code) {
        $data = $this->getDataLimit();
        // dd($data);
        $result = null;
        foreach ($data as $w) {
            if ($w['code'] === $code) {
                $result = $w;
            }
        }
        // dd($result);
        return view('detail', [
            'woodblock' => $result,
        ]);
    }

    public function list(Request $request) {
        // dd($request->all());
        if (empty($request->all()['search'])) {
            // dd($this->getDataLimit());
            return view('woodblock', [
                'data' => $this->getDataLimit(),
            ]);
        } else {
            // dd($this->searchWoodblock($this->getDataLimit(), $request->all()['search']));
            return view('woodblock', [
                'data' => $this->searchWoodblock($this->getDataLimit(), $request->all()['search']),
            ]);
        }
    }

    public function sort($name) {
        dd($name);
    }

    public function show($code) {
        dd($code);
    }
}
