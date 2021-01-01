<?php

namespace App\Http\Traits;

use App\Models\Bill;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

trait Sales {

    public function getNextInvoiceNumber()
    {
        // get next invoice number
        $statement = DB::select("show table status like 'invoices'");
        $next_id = $statement[0]->Auto_increment;

        return "INV-" . str_pad($next_id, 5, "0", STR_PAD_LEFT);
    }

    public function getCustomerName()
    {
        if ( !isset( $this->customer->name ))
        {
            return __("Not Defined");
        }

        return $this->customer->name;
    }

    public function getProductName()
    {
        return $this->product->name;
    }

    // last year profits
    public function getLastYearProfits()
    {
        // get 12 months profits
        $profits_data = [];
        // Circle trough all 12 months
        for ($month = 1; $month <= 12; $month++)
        {
            // Create a Carbon object from the current year and the current month (equals 2020-01-01 00:00:00)
            $date = Carbon::create(date('Y'), $month);

            // Make a copy of the start date and move to the end of the month (e.g. 2020-01-31 23:59:59)
            $date_end = $date->copy()->endOfMonth();

            $profits = Invoice::where('invoiced_at', '>=', $date)
                ->where('invoiced_at', '<=', $date_end)
                ->sum('profit');

            // Save the count of transactions for the current month in the output array
            $profits_data[$month] = $profits;
        }

        return $profits_data;
    }

    // last week profits
    public function getLastWeekProfits()
    {
        Date::setWeekStartsAt(Date::SATURDAY);
        Date::setWeekEndsAt(Date::THURSDAY);

        $date = Date::parse(now())->startOfWeek();
        $date_end = now();

        $profits = Invoice::whereBetween('invoiced_at', [$date, $date_end])->sum('profit');

        return sprintf('%1.2f', $profits);
    }

    // last year incomes
    public function getLastYearIncomes()
    {
        // get 12 months profits
        $incomes_data = [];

        // Circle trough all 12 months
        for ($month = 1; $month <= 12; $month++)
        {
            $date = Carbon::create(date('Y'), $month);

            $date_end = $date->copy()->endOfMonth();

            $incomes = Invoice::where('invoiced_at', '>=', $date)
                ->where('invoiced_at', '<=', $date_end)
                ->sum('total');

            $incomes_data[$month] = $incomes;
        }

        return $incomes_data;
    }

    // daily incomes
    public function getDailyIncomes()
    {
        $date = now()->startOfDay();
        $date_end = now();

        $incomes = Invoice::whereBetween('invoiced_at', [$date, $date_end])->sum('total');

        return sprintf('%1.2f', $incomes);
    }

    public function getFormattedDates()
    {
        $formatted_dates = [];
        $year = now()->year;
        for ($month = 1; $month <= 12; $month++)
        {
            $date = Date::create($year, $month)->format("M Y");
            $formatted_dates[$month] = $date;
        }

        return $formatted_dates;
    }

}
