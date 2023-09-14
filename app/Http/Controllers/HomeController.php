<?php

namespace App\Http\Controllers;

use App\Service; // Asegúrate de incluir el modelo adecuado en la parte superior.

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('welcome', compact('services'));
    }
}

