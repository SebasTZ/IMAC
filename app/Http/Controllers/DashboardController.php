<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal (dashboard).
     */
    public function index()
    {
        return view('dashboard');
    }
}
