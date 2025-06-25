<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); // ou qualquer outra view como 'home'
    }
}
