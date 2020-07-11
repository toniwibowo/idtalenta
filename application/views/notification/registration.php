<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Email Confirmation</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    </style>
  </head>
  <body style="background:#eee; font-family: 'Roboto', sans-serif;">
    <div style="padding:30px; display:block">
      <div style="margin: 0 auto; padding: 0 15px; max-width: 768px; background:#fff">
        <div style="display:flex; flex-wrap:wrap; margin:0 -15px;">
          <div style="max-width:100%; flex: 0 0 100%; position:relative; width:100%">
            <table style="width:100%; border:0;" cellpadding="15" cellspacing="0">
              <tr>
                <td align="center" style="border-bottom:solid thin #ccc">
                  <img src="<?= base_url('images/logo-dark.png') ?>" style="max-width:200px" alt="IDTalenta">
                </td>
              </tr>
              <tr>
                <td>
                  <h4>Dear <?= $name ?></h4>
                  <p>
                    Selamat datang di IDTalenta, akun anda telah dibuat, silahkan melakukan konfirmasi email anda dengan cara klik button dibawah ini.
                    <br>
                    <br>
                    <a href="<?= site_url('member/validate/'.$email) ?>" style="background:#0088CC; color:#fff; border-radius:5px; padding:10px; text-decoration:none; font-size:14px;" name="button">Validasi Email</a>
                  </p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
