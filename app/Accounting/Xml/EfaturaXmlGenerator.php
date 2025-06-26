<?php

namespace App\Accounting\Xml;

use App\Models\Invoice;
use DOMDocument;

class EfaturaXmlGenerator
{
    public function generate(Invoice $invoice): string
    {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;

        $root = $xml->createElement('Invoice');
        $root->setAttribute('xmlns', 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2');
        $xml->appendChild($root);

        $invoiceNumber = $xml->createElement('ID', $invoice->invoice_number);
        $root->appendChild($invoiceNumber);

        $issueDate = $xml->createElement('IssueDate', $invoice->issue_date->format('Y-m-d'));
        $root->appendChild($issueDate);

        $accountingCustomer = $xml->createElement('AccountingCustomerParty');
        $party = $xml->createElement('Party');
        $partyName = $xml->createElement('PartyName');
        $partyName->appendChild($xml->createElement('Name', $invoice->customer->name ?? 'Müşteri'));
        $party->appendChild($partyName);
        $accountingCustomer->appendChild($party);
        $root->appendChild($accountingCustomer);

        $linesElement = $xml->createElement('InvoiceLines');
        foreach ($invoice->lines as $line) {
            $item = $xml->createElement('InvoiceLine');

            $desc = $xml->createElement('Item');
            $desc->appendChild($xml->createElement('Name', $line['description']));
            $item->appendChild($desc);

            $qty = $xml->createElement('InvoicedQuantity', $line['quantity']);
            $item->appendChild($qty);

            $price = $xml->createElement('Price');
            $price->appendChild($xml->createElement('PriceAmount', number_format($line['unit_price'], 2, '.', '')));
            $item->appendChild($price);

            $linesElement->appendChild($item);
        }
        $root->appendChild($linesElement);

        $legalMonetaryTotal = $xml->createElement('LegalMonetaryTotal');
        $legalMonetaryTotal->appendChild($xml->createElement('PayableAmount', number_format($invoice->total, 2, '.', '')));
        $root->appendChild($legalMonetaryTotal);

        return $xml->saveXML();
    }
}

