<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{

    public function index(Request $request)
    {
        $last_week_date = Carbon::today()->subWeek();
        $last_month_date = Carbon::today()->subMonth();
        $last_day_date = Carbon::now()->subDay();

        $purchases = Purchase::where('created_at', '>=', $last_week_date)
            -> orderBy('created_at', 'desc')
            -> paginate(10);

        if ($request->sort == 'month') {
            $purchases = Purchase::where('created_at', '>=', $last_month_date)
                -> orderBy('created_at', 'desc')
                -> paginate(10);
        }

        if ($request->sort == 'day') {
            $purchases = Purchase::where('created_at', '>=', $last_day_date)
                -> orderBy('created_at', 'desc')
                -> paginate(10);
        }

        return view('dashboard.purchases.index', compact('purchases'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Purchase $purchase)
    {
        //
    }


    public function edit(Purchase $purchase)
    {
        //
    }


    public function update(Request $request, Purchase $purchase)
    {
        //
    }


    public function destroy(Purchase $purchase)
    {
        //
    }
}
