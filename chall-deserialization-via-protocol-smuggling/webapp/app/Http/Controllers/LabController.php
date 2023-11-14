<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $request->get('url'),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 5
        ]);
        $output = curl_exec($ch);
        echo $output;
    }
}
