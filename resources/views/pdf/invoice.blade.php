<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Fatura - {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        .header { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .total { font-size: 16px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">FATURA</div>

    <strong>Fatura No:</strong> {{ $invoice->invoice_number }}<br>
    <strong>Tarih:</strong> {{ $invoice->issue_date->format('d.m.Y') }}<br>
    <strong>Müşteri:</strong> {{ $invoice->customer->name ?? 'Müşteri' }}<br>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Açıklama</th>
                <th>Adet</th>
                <th>Birim Fiyat</th>
                <th>Tutar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->lines as $i => $line)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $line['description'] }}</td>
                    <td>{{ $line['quantity'] }}</td>
                    <td>{{ number_format($line['unit_price'], 2, ',', '.') }} ₺</td>
                    <td>{{ number_format($line['quantity'] * $line['unit_price'], 2, ',', '.') }} ₺</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <div class="total">
        Toplam: {{ number_format($invoice->total, 2, ',', '.') }} ₺
    </div>
</body>
</html>
