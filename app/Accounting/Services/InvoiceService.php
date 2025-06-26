<?php

namespace App\Accounting\Services;

use App\Accounting\Events\InvoiceCreated;
use App\Models\Invoice;
use Illuminate\Support\Str;

class InvoiceService
{
    public function create(array $data): Invoice
    {
        $invoice = Invoice::create([
            'customer_id' => $data['customer_id'],
            'invoice_number' => strtoupper(Str::uuid()),
            'issue_date' => $data['issue_date'],
            'due_date' => $data['due_date'],
            'total' => $data['total'],
            'lines' => $data['lines'],
        ]);

        event(new InvoiceCreated($invoice));

        return $invoice;
    }
}
