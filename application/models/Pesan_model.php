<?php

class Pesan_model extends CI_Model {
   public function __construct(){
      parent::__construct();
   }

   public function create_order($arr_data){
      $this->db->insert("booth_order", $arr_data);
   }

   public function get_confirm_email($hash){
      $q = $this->db->query("select booking_id, booth_id, email from booth_order where confirmation_hash = '$hash' and address_hash = ''");
      return $q->result();
   }

   public function get_payment_data($hash){
      $q = $this->db->query("select booking_id, booth_id, email from booth_order where address_hash = '$hash'");
      return $q->result();
   }

   public function send_confirm_mail($email, $hash){

      //Load email library
      $this->load->library('email');

      //SMTP & mail configuration
      $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => 'ssl://smtp.googlemail.com',
         'smtp_port' => 465,
         'smtp_user' => 'marcondol.demo@gmail.com',
         'smtp_pass' => 'testing123',
         'mailtype'  => 'html',
         'charset'   => 'utf-8'
      );
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");

      //Email content
      $htmlContent = '<h1>Anda Memesan Booth untuk Fashion Week</h1>';
      $htmlContent .= "<p>klik untuk Konfirmasi <br>".base_url()."index.php?/pesan/email_verification/$hash</p>";

      $this->email->to($email);
      $this->email->from('marcondol_demo@gmail.com','Fashion Week');
      $this->email->subject('Email Konfirmasi Pemesanan Booth');
      $this->email->message($htmlContent);

      //Send email
      $this->email->send();
   }

   public function send_member_mail($email, $hash){

      //Load email library
      $this->load->library('email');

      //SMTP & mail configuration
      $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => 'ssl://smtp.googlemail.com',
         'smtp_port' => 465,
         'smtp_user' => 'marcondol.demo@gmail.com',
         'smtp_pass' => 'testing123',
         'mailtype'  => 'html',
         'charset'   => 'utf-8'
      );
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");

      //Email content
      $htmlContent = '<h1>Halaman </h1>';
      $htmlContent .= "<p>Halaman Tagihan anda
                        <br>".base_url()."index.php?/pesan/konfirmasi/$hash</p>";

      $this->email->to($email);
      $this->email->from('marcondol_demo@gmail.com','Fashion Week');
      $this->email->subject('Halaman Pembayaran Anda');
      $this->email->message($htmlContent);

      //Send email
      $this->email->send();
   }

   public function update_verified_order($booking_id, $data_hash){
      $arr_hash = array("address_hash"=>$data_hash);
      $this->db->update("booth_order",$arr_hash, "booking_id = '$booking_id'");
   }

}