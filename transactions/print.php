<?php
  if (isset($_GET['transaction_id'])) {
    $transaction = querysatudata("SELECT * FROM transactions WHERE id=" . $_GET['transaction_id'] . "    ");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h4 style="margin: auto;">Toko Norkayati</h4>
    <table>
    <tr>
            <th><?= $transaction['name_buyer'] ?></th>
            <th><?= $transaction['type_buyer'] ?></th>
            <th colspan="2"><?= $transaction['updated_at'] ?></th>
        </tr>
        <tr>
            <th>Nama</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        <?php
        $carts = querybanyak("SELECT * FROM carts WHERE transaction_id = " . $_GET['transaction_id'] . "  ");
        foreach ($carts as $cart) {
            $productprice = querysatudata("SELECT * FROM productprices LEFT JOIN products ON productprices.product_id = products.id WHERE productprices.id = " . $cart['productprice_id'] . " ");
        ?>
            <tr>
                <td><?= $productprice['name_product'] ?></td>
                <td><?= $cart['qty'] ?></td>
                <td><?= $cart['price'] ?></td>
                <td><?= $cart['sum_price'] ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><?= $transaction['total'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tunai</td>
            <td><?= $transaction['cash'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Kembali</td>
            <td><?= $transaction['changes'] ?></td>
        </tr>



    </table>
    <script>
        window.print();
    </script>

</body>

</html>