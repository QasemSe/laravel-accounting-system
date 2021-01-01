<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class BillsController extends Controller
{

    public function index(Request $request)
    {
        $last_week_date = Date::today()->subWeek();
        $last_month_date = Date::today()->subMonth();
        $last_day_date = Date::now()->subDay();

        $bills = Bill::where('created_at', '>=', $last_week_date)
            -> orderBy('created_at', 'desc')
            -> paginate(10);

        if ($request->sort == 'month') {
            $bills = Bill::where('created_at', '>=', $last_month_date)
                -> orderBy('created_at', 'desc')
                -> paginate(10);
        }

        if ($request->sort == 'day') {
            $bills = Bill::where('created_at', '>=', $last_day_date)
                -> orderBy('created_at', 'desc')
                -> paginate(10);
        }

        return view('dashboard.bills.index', compact('bills'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Bill $bill)
    {
        //
    }


    public function edit(Bill $bill)
    {
        //
    }


    public function update(Request $request, Bill $bill)
    {
        //
    }


    public function destroy(Bill $bill)
    {
        //
    }
}
