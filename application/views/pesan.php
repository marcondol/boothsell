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
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Perhisasan</a></li>
            <li><a href="#">Pakaian</a></li>
            <li><a href="#">Aksesoris</a></li>
            <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart icon-large" aria-hidden="true"></span>Keranjang</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>
   <div class="container">
      <br>
      <div class="page-header">
        <h4 class="modal-title">Anda akan memesan</h4>
        <h4 class="modal-title">Nomor Booth <?=$data->idx?></h4>
      </div>
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
         <h4> Informasi Pemesan </h4>
         <form action="<?=base_url()?>index.php?/pesan/add" method="post" name="frm_pesan">
            <input type="hidden" name="booth_id" value="<?=$data->idx?>">
            <input type="hidden" name="booth_price" value="<?=$data->booth_price?>">
            <div class="form-group">
               <label for="nama">Nama Pemesan</label>
               <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="no_telp">Nomor Telepon</label>
               <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp">
            </div>

            <button type="submit" class="btn btn-default">Kirim</button>
       </form>

   </div>
    <!-- Begin page content -->


    <!-- <script type="text/javascript" src="assets/dist/app.bundle.js"></script> -->
   <script type="text/javascript">

   </script>
   </body>
</html>
