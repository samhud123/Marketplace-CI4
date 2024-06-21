<!-- app/Views/invoice_template.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .invoice-box {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h5>FREEWORK</h5>
                            </td>
                            <td>
                                Invoice #: <?= $order->order_id; ?><br>
                                Created: <?= $order->created_at; ?><br>
                                Due: January 31, 2024
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <?= $order->seller; ?><br>
                                <?= $order->emailSeller; ?><br>
                                <?= $order->tlpSeller ?><br>
                                <?= $order->alamatSeller; ?>
                            </td>
                            <td>
                                <?= $order->buyer; ?><br>
                                <?= $order->emailBuyer; ?><br>
                                <?= $order->tlpSeller; ?><br>
                                <?= $order->alamatBuyer; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td>

                </td>
            </tr>
            <tr class="details">
                <?php if ($order->payment_type != NULL) : ?>
                    <td>
                        <?= $order->payment_type; ?>
                    </td>
                <?php else : ?>
                    <td>Unpaid</td>
                <?php endif; ?>
                <td>

                </td>
            </tr>
            <tr class="heading">
                <td>
                    Item
                </td>
                <td>
                    Price
                </td>
            </tr>
            <tr class="item">
                <td>
                    <?= $order->judul; ?>
                </td>
                <td>
                    Rp <?= $order->harga; ?>
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>
                    Total: Rp <?= $order->harga; ?>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Message
                </td>
            </tr>
            <tr class="details">
                <td>
                <?= $order->pesan; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>