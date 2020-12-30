<?php

namespace App\Http\Traits;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Sales {

    public function getNextInvoiceNumber()
    {
        // get next invoice number
        $statement = DB::select("show table status like 'invoices'");
        $next_id = $statement[0]->Auto_increment;
        $next_invoice_number = "INV-" . str_pad($next_id, 5, "0", STR_PAD_LEFT);

        return $next_invoice_number;
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
        $index = 0;
        // Circle trough all 12 months
        for ($month = 12; $month >= 1; $month--)
        {
            // Create a Carbon object from the current year and the current month (equals 2020-01-01 00:00:00)
            $date = Carbon::parse(now())->subMonths($index)->firstOfMonth();

            // Make a copy of the start date and move to the end of the month (e.g. 2020-01-31 23:59:59)
            $date_end = $date->copy()->endOfMonth();

            $profits = Invoice::where('created_at', '>=', $date)
                ->where('created_at', '<=', $date_end)
                ->sum('profit');

            // Save the count of transactions for the current month in the output array
            $profits_data[$month] = $profits;
            $index ++;
        }

        return $profits_data;
    }

}
