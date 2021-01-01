<?php

namespace App\Http\Traits;

use App\Models\Bill;
use Carbon\Carbon;
use Jenssegers\Date\Date;

trait Purchases {

    // last year bills
    public function getLastYearBills()
    {
        // get 12 months profits
        $purchases_data = [];
        // Circle trough all 12 months
        for ($month = 1; $month <= 12; $month++)
        {
            // Create a Carbon object from the current year and the current month (equals 2020-01-01 00:00:00)
            $date = Carbon::create(date('Y'), $month);

            // Make a copy of the start date and move to the end of the month (e.g. 2020-01-31 23:59:59)
            $date_end = $date->copy()->endOfMonth();

            $purchases = Bill::where('billed_at', '>=', $date)
                ->where('billed_at', '<=', $date_end)
                ->sum('amount');

            // Save the count of transactions for the current month in the output array
            $purchases_data[$month] = $purchases;
        }

        return $purchases_data;
    }

    // last week bills
    public function getWeeklyBills()
    {
        Date::setWeekStartsAt(Date::SATURDAY);
        Date::setWeekEndsAt(Date::THURSDAY);

        $date = Date::parse(now())->startOfWeek();
        $date_end = now();

        $amount = Bill::where('billed_at', '>=', $date)
            ->where('billed_at', '<=', $date_end)
            ->sum('amount');

        return sprintf('%1.2f', $amount);
    }

}
