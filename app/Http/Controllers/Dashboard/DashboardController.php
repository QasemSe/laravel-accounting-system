<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\Purchases;
use App\Http\Traits\Sales;

class DashboardController extends Controller
{
    use Sales, Purchases;

    public function index()
    {
        $formatted_dates = $this->getFormattedDates();
        $profits_data = $this->getLastYearProfits();
        $incomes_data = $this->getLastYearIncomes();
        $purchases_data = $this->getLastYearBills();

        $last_week_profits = $this->getLastWeekProfits();
        $daily_incomes = $this->getDailyIncomes();
        $weekly_bills = $this->getWeeklyBills();

        return view('dashboard.index', compact('profits_data', 'incomes_data', 'purchases_data', 'formatted_dates', 'last_week_profits', 'daily_incomes', 'weekly_bills'));
    }

    public function live_data()
    {
        $daily_incomes = $this->getDailyIncomes();
        $last_week_profits = $this->getLastWeekProfits();
        $weekly_bills = $this->getWeeklyBills();

        return response()->json([
            'data' => [
                'daily_incomes' => $daily_incomes,
                'last_week_profits' => $last_week_profits,
                'weekly_bills' => $weekly_bills,
            ]
        ]);
    }
}
