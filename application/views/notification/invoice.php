<?php $row = $queryInvoice->row(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
      @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    </style>
  </head>
  <body style="background-color:#eee; font-family: 'Roboto', sans-serif; font-size:14px">
    <div class="container" style="max-width:660px; margin: 0 auto; padding:1%;">
      <div class="row" style="background-color:#fff; padding:20px">
        <table class="table-header" style="width:100%">
          <tr>
            <td align="center">
              <img src="<?= base_url('images/logo-dark.png') ?>" style="max-width:180px" alt="">
              <p style="margin-top:4px; letter-spacing: 3px; color:#ccc;font-size:12px">This wording for tagline</p>
              <h4 style="margin:0">No. Transaksi : <?= 'ARTDM'.$row->order_id.'-'.$row->user_id.$row->invoice ?></h4>
            </td>
          </tr>
        </table>

        <table class="table-title" style="width:100%; margin-top:20px; border-bottom:solid thin #0088CC; padding-bottom:20px; margin-bottom:20px">
          <tr>
            <td align="left" style="line-height:2;">
              Invoice No. :<br>
              Tanggal :<br>
              Tempo :
            </td>
            <td align="left" style="line-height:2;">
              <?= 'ART - '.$row->invoice; ?> <br />
              <?= date('d-m-Y',strtotime($row->order_date));  ?> <br>
              <?= date('d-m-Y',strtotime($this->app->due_date($row->order_date, 1)));  ?>
            </td>
          </tr>
          <tr>
            <td width="50%" valign="top">
              <h4 style="margin:10px 0">Ditagihkan kepada:</h4>
            </td>
            <td valign="top">
              <p style="margin:4px 0"><strong><?= $user->full_name ?></strong></p>
              <p style="margin:0"><?= $user->address ?></p>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <?php $grandtotal = $row->total + $row->uniq_code; ?>
              <h3 style="display:inline-block; border:solid thin #0088CC; padding:10px;">TOTAL TAGIHAN : Rp. <?= number_format($grandtotal,0,',','.') ?>,-</h3>
              <p style="margin:0">Status : <?= $row->payment == 0 ? 'Menunggu Pembayaran' : 'Dibayarkan';  ?></p>
            </td>
          </tr>
        </table>

        <h4 style="color:#0088CC">DETAIL ORDER</h4>

        <table style="width:100%; border-collapse: collapse; border: solid thin #ccc; border-color:#ccc;" border="1">

          <thead>
            <tr>
              <th style="padding: 10px 0; border-bottom:solid thin #ccc">Item</th>
              <th style="padding: 10px 0; border-bottom:solid thin #ccc">Keterangan</th>
            </tr>
          </thead>

          <tbody>

            <?php $listInvoice = $this->db->where('order_id',$row->order_id) -> from('order_item')->join('mentor_class','mentor_class.mentor_class_id=order_item.product_id')->get();  ?>
            <?php if ($listInvoice->num_rows() > 0): ?>
              <?php foreach ($listInvoice->result() as $key => $inv): ?>

                <?php if ($inv->sale != 0): ?>
                  <?php $price = $this->app->sale($inv -> price, $inv -> sale)  ?>
                  <?php else: ?>
                  <?php $price = $inv -> price  ?>
                <?php endif; ?>

                <tr>
                  <td style="padding:10px"><img style="max-width: 100%" width="150" src="<?= base_url('assets/uploads/files/'.$inv->poster) ?>" alt=""> </td>
                  <td style="padding:10px">
                    <p style="line-height:24px">
                      <strong>Judul: </strong> <?= $inv->title ?> <br>
                      <strong>Harga: </strong> Rp. <?= number_format($price,0,',','.') ?>,-
                    </p>
                  </td>
                </tr>

              <?php endforeach; ?>
            <?php endif; ?>

            <tr>
              <td></td>
              <td style="padding:10px">Kode Unik Rp. <?php echo number_format($row->uniq_code,0,',','.') ?>,-</td>
            </tr>

          </tbody>





        </table>

        <p style="text-align:right">Terima kasih sudah berbelanja di ARTademi.</p>

        <table width="100%">
          <tr>
            <td style="background-color:#ddd; padding:10px">
Segala bentuk informasi seperti nomor kontak, alamat e-mail, atau password kamu bersifat rahasia. Jangan menginformasikan data-data tersebut kepada siapa pun, termasuk kepada pihak yang mengatasnamakan ARTAdemi.
            </td>
          </tr>
        </table>

        <table class="table-footer" style="width:100%; background-color:#212529; text-align:center; margin-top:20px;">
          <tr>
            <td align="right" width="50%"><span style="color:#fff; margin-right:15px;">Follow Us :</span></td>
            <td align="left" style="padding:6px 0 2px">

              <a style="display:inline-block; background:#fff; color:#0088CC; border-radius:50%; width:30px; height:30px; position:relative" target="_blank" href="https://www.facebook.com/">
                <i style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%);font-size:16px" class="fa fa-facebook"></i>
              </a>
              <a style="display:inline-block; background:#fff; color:#0088CC; border-radius:50%; width:30px; height:30px; position:relative" target="_blank" href="https://www.instagram.com/">
                <i style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%);font-size:16px" class="fa fa-instagram"></i>
              </a>
            </td>
          </tr>
        </table>

        <p style="text-align:center; margin-bottom:0"><small>Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</small></p>
      </div>
    </div>
  </body>
</html>
