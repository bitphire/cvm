<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        return 'company profile';
    }

    public function create() {
        return 'company create';
    }

    public function store() {
        return 'company save';
    }
}
