<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Sales;

class DashboardController extends Controller
{
    use Sales;
    public function index() {

        $profits_data = $this->getLastYearProfits();

        return view('dashboard.index', compact('profits_data'));
    }
}
