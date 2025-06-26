<?php

namespace App\Accounting\Pdf;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;

class InvoicePdfGenerator
{
    public function generate(Invoice $invoice): string
    {
        return Pdf::loadView('pdf.invoice', compact('invoice'))->output(); // Output the PDF as a string ('F' for file, 'S' for string)
    }
}
