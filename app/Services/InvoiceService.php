<?php

namespace App\Services;

use App\Repositories\InvoiceRepository;

class InvoiceService extends CrudService
{
    protected InvoiceRepository $invoiceRepository;

    /**
     * @param InvoiceRepository $invoiceRepository
     * @return void
    */
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        parent::__construct($this->invoiceRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
