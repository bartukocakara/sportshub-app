<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository extends BaseRepository
{
    protected Invoice $invoice;

    /**
     * @param Invoice $invoice
     * @return void
    */
    public function __construct(Invoice $invoice)
    {
        parent::__construct($invoice);
        $this->invoice = $invoice;
    }
}
