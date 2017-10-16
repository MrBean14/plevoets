<?php

namespace App\Http\Controllers;

use App\Factuur;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index() {
        return view('export.index');
    }

    public function export() {
        $facturen = Factuur::all();
    }
}
