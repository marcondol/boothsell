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
      <br>
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
         <?php if($order_state=='booked'){?>
         <p>Untuk menyelesaikan transaksi silahkan konfirmasi pembayaran !</p>
         <p>lampirkan scan/foto bukti transfer kemudian klik tombol konfirmasi</p>
         <br>

            <form name="confirm_payment" id="confirm_payment" enctype="multipart/form-data">
               <span class='glyphicon glyphicon-picture' id='upload_image'>
                  <input type="hidden" name="idx" id="idx" value="<?=$hash?>">
                  <input type='file' id='img_frm' name='img_frm' accept="image/*" style="display:none"/>
               </span>
               <label for='img_frm'>Klik atau Drag File ke sini</label>

            <br>
            <button class="btn btn-primary" id="confirm" >Konfirmasi</button>
            </form>
            <div id="preview"></div>
         <?php }else{?>
            <img src="uploads/<?=$hash?>.png" width="500px" height="400px" alt="">
            <p>Sedang dalam pengecekan Pembayaran, Terimakasih!</p>
            <?php }?>
   </div>
    <!-- Begin page content -->

   <script type="text/javascript">
      $(document).on('change','#img_frm', function(e){
         var img = Array.from(e.target.files).map(d=> URL.createObjectURL(d));
         img.forEach(function(o, i){
            let is = document.createElement('img');
            is.src = o;
            is.height = 400;
            is.width = 600;
            $("#preview").html(is);
         })
      })

      $(document).on('click','#confirm',function(e){
         e.preventDefault();
         var form = $('#confirm_payment')[0];
         var data = new FormData(form);
         $.ajax({
               url : "<?=base_url()?>index.php/pesan/payment_confirm",
               type: "POST",
               data : data,
               processData: false,
               contentType: false,
               success:function(data_, textStatus, jqXHR){
                 if(data_ == 'sukses'){
                  $('#confirm_payment').hide();
                  $('#preview').append('<p>Sedang dalam pengecekan Pembayaran, Terimakasih!</p>');
                 }
               },
               error: function(jqXHR, textStatus, errorThrown){
                  //if fails
               }
            });
      });
   </script>
   </body>
</html>
