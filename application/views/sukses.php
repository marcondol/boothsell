<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alokasi Booth</title>
    <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
   <script src="assets/js/jquery.min.js" > </script>
   <script src="assets/js/d3.min.js" > </script>
   <script src="assets/js/bootstrap.min.js" ></script>
   <script src="assets/js/handlebars.js" ></script>
  </head>
  <body>

  <body>
   <?php
      $data = $arr_prop[0]
   ?>
   <div class="container">
      <br>
        <h4 class="modal-title"> Anda Memesan Nomor Booth <?=$data->idx?></h4>
         <table class="table">
            <tr>
               <td class="col-lg-2">Luas :</td>
               <td><?=$data->booth_spec->luas?></td>
            </tr>
            <tr>
               <td class="col-lg-2">listrik :</td>
               <td><?=$data->booth_spec->listrik?></td>
            </tr>
            <tr>
               <td class="col-lg-2">Meja :</td>
               <td><?=$data->booth_spec->Meja?></td>
            </tr>
            <tr>
               <td class="col-lg-2">Kursi :</td>
               <td><?=$data->booth_spec->Kursi?></td>
            </tr>
            <tr>
               <td class="col-lg-2">Harga :</td>
               <td><?="Rp ".number_format($data->booth_price,0,",",".")?></td>
            </tr>
         </table>
         <h4> Silahkan Cek Email anda untuk Konfirmasi Alamat Email </h4>
   </div>
    <!-- Begin page content -->


    <!-- <script type="text/javascript" src="assets/dist/app.bundle.js"></script> -->
   <script type="text/javascript">

   </script>
   </body>
</html>
