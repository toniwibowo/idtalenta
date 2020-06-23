<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/custom.css">
  </head>
  <body>
    <?php $row = $order->row_array()  ?>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col">
          <p>
            Customer : <?= $row['full_name'] ?>
            <br>
            Invoice No : <?= $row['invoice'] ?>
            <br>
            Order Date : <?= date('d-M-Y H:i:s', strtotime($row['order_date'].$row['order_time'])) ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-striped">
            <tr>
              <th>Item</th>
              <th>Name</th>
              <th style="text-align:center">Qty</th>
              <th style="text-align:right" align="right">Price</th>
              <th style="text-align:right" align="right">Sub total</th>
            </tr>
            <?php $total = 0; ?>
            <?php if ($orderItem->num_rows() > 0): ?>
              <?php foreach ($orderItem->result_array() as $key => $value): ?>
                <?php
                $price = $value['sale'] != 0 ? $value['price'] - ($value['price'] * ($value['sale'] / 100)) : $value['price'];
                $subtotal = $price * $value['qty'];
                $total = $total + $subtotal;
                ?>
                <tr>
                  <td><img width="120" class="img-fluid" src="<?= base_url('assets/uploads/files/'.$value['poster']) ?>" alt=""></td>
                  <td><?= $value['title'] ?></td>
                  <td align="center"><?= $value['qty'] ?></td>
                  <td align="right">Rp. <?= number_format($price,0,',','.') ?></td>
                  <td align="right">Rp. <?= number_format($subtotal,0,',','.') ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
              <tr>
                <td align="right" colspan="4">Uniq Code</td>
                <td align="right"><strong>Rp. <?= number_format($row['uniq_code'],0,',','.') ?></strong></td>
              </tr>
              <tr>
                <td align="right" colspan="4">Total</td>
                <td align="right"><strong>Rp. <?= number_format($total + $row['uniq_code'],0,',','.') ?></strong></td>
              </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
