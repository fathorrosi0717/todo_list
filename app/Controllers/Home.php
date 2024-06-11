<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'url' => base_url()
        ];
        return view('documentation', $data);
    }
}